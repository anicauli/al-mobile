<?php

namespace App\Utils;

use App\Models\CarPublication;

abstract class PublicationFields
{
    public static function getFieldsByPublicationType(string $publicationClass): array
    {
        $configPath = [
            CarPublication::class => 'publication.car.index'
        ][$publicationClass];

        return config($configPath);
    }

    public static function getValidationRules(string $publicationClass, array $publicationData): array
    {
        $getChoiceValues = function ($field) use ($publicationClass, $publicationData) {
            $availableValues = [];
            if ($field['options_source'] == 'config') {
                $options = config($field['options_path']);
                if (!$options) return [];
                $availableValues = array_map(fn($i) => $i['value'], $options);
            } else if ($field['options_source'] == 'enum') {
                $availableValues = array_map(fn($i) => $i->value, call_user_func($field['options_path'] . '::cases' ));
            }

            return $availableValues;
        };

        $fields = self::getFieldsByPublicationType($publicationClass);
        $rules = [];
        $toEmptyFields = [];
        foreach ($fields as $field) {
            if ($field['type'] == 'integer') {
                $rules[$field['field']] = ['sometimes', 'nullable', 'integer'];
                if (isset($field['min'])) {
                    $rules[$field['field']]['min'] = $field['min'];
                }
                if (isset($field['max'])) {
                    $rules[$field['field']]['max'] = $field['max'];
                }
                continue;
            }

            if ($field['type'] == 'choice') {
                $availableValues = $getChoiceValues($field);
                $availableValuesStr = implode(',', $availableValues);
                $rules[$field['field']] = ['sometimes', 'nullable', 'in:' . $availableValuesStr];
                continue;
            }

            if ($field['type'] == 'related') {
                $relatedTo = $field['related_to'];
                if (isset($publicationData[$relatedTo]) && $publicationData[$relatedTo]) {
                    $field['options_path'] = str_replace(
                        "{{$relatedTo}}", $publicationData[$relatedTo], $field['options_path']
                    );
                    $availableValues = $getChoiceValues($field);
                    $availableValuesStr = implode(',', $availableValues);
                    $rules[$field['field']] = ['sometimes', 'nullable', 'in:' . $availableValuesStr];
                } else {
                    $toEmptyFields[] = $field['field'];
                    $rules[$field['field']] = ['nullable'];
                }
                continue;
            }

            if ($field['type'] == 'bool') {
                $rules[$field['field']] = ['sometimes', 'nullable', 'boolean'];
            }
        }

        return [
            'rules' => $rules,
            'to_empty_fields' => $toEmptyFields,
        ];
    }
}

<?php

return [
    [
        'field' => 'make',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.basic.make'
    ],
    [
        'field' => 'model',
        'type' => 'related',
        'related_to' => 'make',
        'options_source' => 'config',
        'options_path' => 'publication.car.basic.models.{make}'
    ],
    [
        'field' => 'vehicle_type',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.basic.vehicle_type'
    ],
    [
        'field' => 'number_of_seats',
        'type' => 'integer',
    ],
    [
        'field' => 'number_of_doors',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.basic.number_of_doors'
    ],
    [
        'field' => 'sliding_door',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.basic.sliding_door'
    ],
    [
        'field' => 'owner_type',
        'type' => 'choice',
        'options_source' => 'enum',
        'options_path' => \App\Enums\CarPublicationOwnerType::class
    ],
    [
        'field' => 'used_condition',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.basic.used_condition'
    ],
    [
        'field' => 'price',
        'type' => 'integer',
    ],
    [
        'field' => 'first_registration_date',
        'type' => 'integer',
    ],
    [
        'field' => 'country',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.country'
    ],
    [
        'field' => 'city',
        'type' => 'related',
        'related_to' => 'country',
        'options_source' => 'config',
        'options_path' => 'publication.city.{country}'
    ],
    [
        'field' => 'fuel_type',
        'type' => 'choice',
        'options_source' => 'enum',
        'options_path' => \App\Enums\CarPublicationFuelType::class
    ],
    [
        'field' => 'power_hp',
        'type' => 'integer',
    ],
    [
        'field' => 'power_kw',
        'type' => 'integer',
    ],
    [
        'field' => 'cubic_capacity',
        'type' => 'integer',
    ],
    [
        'field' => 'fuel_tank_volume',
        'type' => 'integer',
    ],
    [
        'field' => 'weight',
        'type' => 'integer',
    ],
    [
        'field' => 'cylinders',
        'type' => 'integer',
    ],
    [
        'field' => 'driver_type',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.technical.driver_type'
    ],
    [
        'field' => 'transmission',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.technical.transmission'
    ],
    [
        'field' => 'fuel_consumption',
        'type' => 'integer',
    ],
//    [
//        'field' => 'emission_sticker',
//        'type' => 'choice',
//        'options_source' => 'config',
//        'options_path' => 'publication.car.technical.emission_sticker'
//    ],
    [
        'field' => 'emission_class',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.technical.emission_class'
    ],
    [
        'field' => 'has_particulate_filter',
        'type' => 'bool',
    ],
    [
        'field' => 'exterior_colour',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.exterior.exterior_colour'
    ],
    [
        'field' => 'trailer_coupling',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.exterior.trailer_coupling'
    ],
    [
        'field' => 'has_trailer_assist',
        'type'  => 'bool',
    ],
    [
        'field' => 'trailer_load_braked',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.exterior.trailer_load_braked'
    ],
    [
        'field' => 'trailer_load_unbraked',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.exterior.trailer_load_unbraked'
    ],
    [
        'field' => 'nose_weight',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.exterior.nose_weight'
    ],
    [
        'field' => 'has_parking_sensor_360_camera',
        'type' => 'bool',
    ],
    [
        'field' => 'has_parking_sensor_camera',
        'type' => 'bool',
    ],
    [
        'field' => 'has_parking_sensor_front',
        'type' => 'bool',
    ],
    [
        'field' => 'has_parking_sensor_rear',
        'type' => 'bool',
    ],
    [
        'field' => 'has_parking_sensor_rear_traffic_alert',
        'type' => 'bool',
    ],
    [
        'field' => 'has_parking_sensor_self_steering_systems',
        'type' => 'bool',
    ],
    [
        'field' => 'cruise_control',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.exterior.cruise_control'
    ],
    [
        'field' => 'has_abs',
        'type' => 'bool',
    ],
    [
        'field' => 'has_adoptive_cornering_lights',
        'type' => 'bool',
    ],
    [
        'field' => 'has_adoptive_lighting',
        'type' => 'bool',
    ],
    [
        'field' => 'has_air_suspension',
        'type' => 'bool',
    ],
    [
        'field' => 'has_all_season_tyres',
        'type' => 'bool',
    ],
    [
        'field' => 'has_alloy_wheels',
        'type' => 'bool',
    ],
    [
        'field' => 'has_bixenon_headlights',
        'type' => 'bool',
    ],
    [
        'field' => 'has_blind_spot_assist',
        'type' => 'bool',
    ],
    [
        'field' => 'has_central_locking',
        'type' => 'bool',
    ],
    [
        'field' => 'has_daytime_running_lights',
        'type' => 'bool',
    ],
    [
        'field' => 'has_distance_warning_system',
        'type' => 'bool',
    ],
    [
        'field' => 'has_dynamic_chassis_control',
        'type' => 'bool',
    ],
    [
        'field' => 'has_electric_tailgate',
        'type' => 'bool',
    ],
    [
        'field' => 'has_emergency_brake_assist',
        'type' => 'bool',
    ],
    [
        'field' => 'has_emergency_tyre',
        'type' => 'bool',
    ],
    [
        'field' => 'has_emergency_tyre_repair_kit',
        'type' => 'bool',
    ],
    [
        'field' => 'has_esp',
        'type' => 'bool',
    ],
    [
        'field' => 'has_fog_lamps',
        'type' => 'bool',
    ],
    [
        'field' => 'has_folding_roof',
        'type' => 'bool',
    ],
    [
        'field' => 'has_four_wheel_drive',
        'type' => 'bool',
    ],
    [
        'field' => 'has_glare_free_high_beam_headlights',
        'type' => 'bool',
    ],
    [
        'field' => 'has_headlight_windshield',
        'type' => 'bool',
    ],
    [
        'field' => 'has_heated_windshield',
        'type' => 'bool',
    ],
    [
        'field' => 'has_high_beam_assist',
        'type' => 'bool',
    ],
    [
        'field' => 'has_hill_start_assist',
        'type' => 'bool',
    ],
    [
        'field' => 'has_immobilizer',
        'type' => 'bool',
    ],
    [
        'field' => 'has_keyless_central_locking',
        'type' => 'bool',
    ],
    [
        'field' => 'has_lane_change_assist',
        'type' => 'bool',
    ],
    [
        'field' => 'has_laser_headlights',
        'type' => 'bool',
    ],
    [
        'field' => 'has_led_headlights',
        'type' => 'bool',
    ],
    [
        'field' => 'has_led_running_lights',
        'type' => 'bool',
    ],
    [
        'field' => 'has_light_sensor',
        'type' => 'bool',
    ],
    [
        'field' => 'has_night_vision_assist',
        'type' => 'bool',
    ],
    [
        'field' => 'has_panoramic_roof',
        'type' => 'bool',
    ],
    [
        'field' => 'has_power_assisted_steering',
        'type' => 'bool',
    ],
    [
        'field' => 'has_rain_sensor',
        'type' => 'bool',
    ],
    [
        'field' => 'has_roof_rack',
        'type' => 'bool',
    ],
    [
        'field' => 'has_spare_tyre',
        'type' => 'bool',
    ],
    [
        'field' => 'has_speed_limit_control_system',
        'type' => 'bool',
    ],
    [
        'field' => 'has_sports_package',
        'type' => 'bool',
    ],
    [
        'field' => 'has_sports_suspension',
        'type' => 'bool',
    ],
    [
        'field' => 'has_start_stop_system',
        'type' => 'bool',
    ],
    [
        'field' => 'has_steer_wheels',
        'type' => 'bool',
    ],
    [
        'field' => 'has_summer_tyres',
        'type' => 'bool',
    ],
    [
        'field' => 'has_sunroof',
        'type' => 'bool',
    ],
    [
        'field' => 'has_tinted_windows',
        'type' => 'bool',
    ],
    [
        'field' => 'has_traction_control',
        'type' => 'bool',
    ],
    [
        'field' => 'has_traffic_sign_recognition',
        'type' => 'bool',
    ],
    [
        'field' => 'has_tyre_pressure_monitoring',
        'type' => 'bool',
    ],
    [
        'field' => 'has_winter_tyres',
        'type' => 'bool',
    ],
    [
        'field' => 'has_xenon_headlights',
        'type' => 'bool',
    ],
    [
        'field' => 'interior_colour',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.interior.interior_colour'
    ],
    [
        'field' => 'interior_material',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.interior.interior_material'
    ],
    [
        'field' => 'airbags',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.interior.airbags'
    ],
    [
        'field' => 'air_conditioning',
        'type' => 'choice',
        'options_source' => 'config',
        'options_path' => 'publication.car.interior.air_conditioning'
    ],
    [
        'field' => 'has_alarm_system',
        'type' => 'bool',
    ],
    [
        'field' => 'has_ambient_lighting',
        'type' => 'bool',
    ],
    [
        'field' => 'has_android_auto',
        'type' => 'bool',
    ],
    [
        'field' => 'has_apple_car_play',
        'type' => 'bool',
    ],
    [
        'field' => 'has_arm_rest',
        'type' => 'bool',
    ],
    [
        'field' => 'has_autom_dimming_interior_mirrors',
        'type' => 'bool',
    ],
    [
        'field' => 'has_auxiliary_heating',
        'type' => 'bool',
    ],
    [
        'field' => 'has_bluetooth',
        'type' => 'bool',
    ],
    [
        'field' => 'has_cargo_barrier',
        'type' => 'bool',
    ],
    [
        'field' => 'has_cd_player',
        'type' => 'bool',
    ],
    [
        'field' => 'has_dab_radio',
        'type' => 'bool',
    ],
    [
        'field' => 'has_digital_cockpit',
        'type' => 'bool',
    ],
    [
        'field' => 'has_disabled_accessible',
        'type' => 'bool',
    ],
    [
        'field' => 'has_electric_backseat_adjustments',
        'type' => 'bool',
    ],
    [
        'field' => 'has_electric_seat_adjustment',
        'type' => 'bool',
    ],
    [
        'field' => 'has_seat_adjustment_with_memory_function',
        'type' => 'bool',
    ],
    [
        'field' => 'has_electric_side_mirrors',
        'type' => 'bool',
    ],
    [
        'field' => 'has_electric_windows',
        'type' => 'bool',
    ],
    [
        'field' => 'has_emergency_call_system',
        'type' => 'bool',
    ],
    [
        'field' => 'has_fatigue_warning_system',
        'type' => 'bool',
    ],
    [
        'field' => 'has_fold_flat_passenger_seat',
        'type' => 'bool',
    ],
    [
        'field' => 'has_folding_exterior_mirrors',
        'type' => 'bool',
    ],
    [
        'field' => 'has_hands_free_kit',
        'type' => 'bool',
    ],
    [
        'field' => 'has_head_up_display',
        'type' => 'bool',
    ],
    [
        'field' => 'has_heated_rear_seats',
        'type' => 'bool',
    ],
    [
        'field' => 'has_heated_seats',
        'type' => 'bool',
    ],
    [
        'field' => 'has_heated_steering_wheels',
        'type' => 'bool',
    ],
    [
        'field' => 'has_induction_charging_for_smartphones',
        'type' => 'bool',
    ],
    [
        'field' => 'has_integrated_music_streaming',
        'type' => 'bool',
    ],
    [
        'field' => 'has_isofix',
        'type' => 'bool',
    ],
    [
        'field' => 'has_leather_steering_wheel',
        'type' => 'bool',
    ],
    [
        'field' => 'has_lumbar_support',
        'type' => 'bool',
    ],
    [
        'field' => 'has_massage_seats',
        'type' => 'bool',
    ],
    [
        'field' => 'has_multifunctional_steering_wheel',
        'type' => 'bool',
    ],
    [
        'field' => 'has_navigation_system',
        'type' => 'bool',
    ],
    [
        'field' => 'has_on_board_computer',
        'type' => 'bool',
    ],
    [
        'field' => 'has_paddle_shifters',
        'type' => 'bool',
    ],
    [
        'field' => 'has_passenger_seat_isofix_point',
        'type' => 'bool',
    ],
    [
        'field' => 'has_seat_ventilation',
        'type' => 'bool',
    ],
    [
        'field' => 'has_show_right_hand_drive',
        'type' => 'bool',
    ],
    [
        'field' => 'has_ski_bag',
        'type' => 'bool',
    ],
    [
        'field' => 'has_smokers_package',
        'type' => 'bool',
    ],
    [
        'field' => 'has_sound_system',
        'type' => 'bool',
    ],
    [
        'field' => 'has_sport_seats',
        'type' => 'bool',
    ],
    [
        'field' => 'has_touchscreen',
        'type' => 'bool',
    ],
    [
        'field' => 'has_tuner_radio',
        'type' => 'bool',
    ],
    [
        'field' => 'has_tv',
        'type' => 'bool',
    ],
    [
        'field' => 'has_usb_port',
        'type' => 'bool',
    ],
    [
        'field' => 'has_virtual_side_mirrors',
        'type' => 'bool',
    ],
    [
        'field' => 'has_voice_control',
        'type' => 'bool',
    ],
    [
        'field' => 'has_winter_package',
        'type' => 'bool',
    ],
    [
        'field' => 'has_wlan_wifi_hotspot',
        'type' => 'bool',
    ],
];

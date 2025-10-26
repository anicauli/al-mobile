<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_publications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $this->basicData($table);
            $this->technicalData($table);
            $this->exteriorData($table);
            $this->interiorData($table);
            $table->timestamps();
        });
    }

    private function basicData(Blueprint $table): void
    {
        $table->string('make', 100)->nullable();
        $table->string('model', 100)->nullable();
        $table->string('vehicle_type', 20)->nullable();
        $table->integer('number_of_seats')->nullable();
        $table->string('number_of_doors', 10)->nullable();
        $table->string('sliding_door', 20)->nullable();
//        $table->string('payment_type', 10)->nullable(); // Buy / Leasing
        $table->string('owner_type', 10)->nullable();
        $table->string('used_condition', 10)->nullable();
        $table->decimal('price', 20, 2)->nullable();
        $table->integer('first_registration_date')->nullable();
        $table->string('country', 100)->nullable();
        $table->string('city', 100)->nullable();
    }

    private function technicalData(Blueprint $table): void
    {
        $table->string('fuel_type')->nullable();
        // TODO: Check for electric/hybrid extra fields.
        $table->integer('power_hp')->nullable();
        $table->integer('power_kw')->nullable();
        $table->integer('cubic_capacity')->nullable();
        $table->integer('fuel_tank_volume')->nullable();
        $table->integer('weight')->nullable();
        $table->integer('cylinders')->nullable();
        $table->string('driver_type', 20)->nullable();
        $table->string('transmission', 20)->nullable();
        $table->integer('fuel_consumption')->nullable();
//        $table->string('emission_sticker', 20)->nullable();
        $table->string('emission_class', 20)->nullable();
        $table->boolean('has_particulate_filter')->nullable();
    }

    private function exteriorData(Blueprint $table): void
    {
        $table->string('exterior_colour')->nullable();
        $table->string('trailer_coupling')->nullable();
        $table->boolean('has_trailer_assist')->nullable();
        $table->integer('trailer_load_braked')->nullable();
        $table->integer('trailer_load_unbraked')->nullable();
        $table->integer('nose_weight')->nullable();
        $table->boolean('has_parking_sensor_360_camera')->nullable();
        $table->boolean('has_parking_sensor_camera')->nullable();
        $table->boolean('has_parking_sensor_front')->nullable();
        $table->boolean('has_parking_sensor_rear')->nullable();
        $table->boolean('has_parking_sensor_rear_traffic_alert')->nullable();
        $table->boolean('has_parking_sensor_self_steering_systems')->nullable();
        $table->string('cruise_control', 20)->nullable();
        $table->boolean('has_abs')->nullable();
        $table->boolean('has_adoptive_cornering_lights')->nullable();
        $table->boolean('has_adoptive_lighting')->nullable();
        $table->boolean('has_air_suspension')->nullable();
        $table->boolean('has_all_season_tyres')->nullable();
        $table->boolean('has_alloy_wheels')->nullable();
        $table->boolean('has_bixenon_headlights')->nullable();
        $table->boolean('has_blind_spot_assist')->nullable();
        $table->boolean('has_central_locking')->nullable();
        $table->boolean('has_daytime_running_lights')->nullable();
        $table->boolean('has_distance_warning_system')->nullable();
        $table->boolean('has_dynamic_chassis_control')->nullable();
        $table->boolean('has_electric_tailgate')->nullable();
        $table->boolean('has_emergency_brake_assist')->nullable();
        $table->boolean('has_emergency_tyre')->nullable();
        $table->boolean('has_emergency_tyre_repair_kit')->nullable();
        $table->boolean('has_esp')->nullable();
        $table->boolean('has_fog_lamps')->nullable();
        $table->boolean('has_folding_roof')->nullable();
        $table->boolean('has_four_wheel_drive')->nullable();
        $table->boolean('has_glare_free_high_beam_headlights')->nullable();
        $table->boolean('has_headlight_windshield')->nullable();
        $table->boolean('has_heated_windshield')->nullable();
        $table->boolean('has_high_beam_assist')->nullable();
        $table->boolean('has_hill_start_assist')->nullable();
        $table->boolean('has_immobilizer')->nullable();
        $table->boolean('has_keyless_central_locking')->nullable();
        $table->boolean('has_lane_change_assist')->nullable();
        $table->boolean('has_laser_headlights')->nullable();
        $table->boolean('has_led_headlights')->nullable();
        $table->boolean('has_led_running_lights')->nullable();
        $table->boolean('has_light_sensor')->nullable();
        $table->boolean('has_night_vision_assist')->nullable();
        $table->boolean('has_panoramic_roof')->nullable();
        $table->boolean('has_power_assisted_steering')->nullable();
        $table->boolean('has_rain_sensor')->nullable();
        $table->boolean('has_roof_rack')->nullable();
        $table->boolean('has_spare_tyre')->nullable();
        $table->boolean('has_speed_limit_control_system')->nullable();
        $table->boolean('has_sports_package')->nullable();
        $table->boolean('has_sports_suspension')->nullable();
        $table->boolean('has_start_stop_system')->nullable();
        $table->boolean('has_steer_wheels')->nullable();
        $table->boolean('has_summer_tyres')->nullable();
        $table->boolean('has_sunroof')->nullable();
        $table->boolean('has_tinted_windows')->nullable();
        $table->boolean('has_traction_control')->nullable();
        $table->boolean('has_traffic_sign_recognition')->nullable();
        $table->boolean('has_tyre_pressure_monitoring')->nullable();
        $table->boolean('has_winter_tyres')->nullable();
        $table->boolean('has_xenon_headlights')->nullable();
    }

    private function interiorData(Blueprint $table): void
    {
        $table->string('interior_colour', 20)->nullable();
        $table->string('interior_material', 20)->nullable();
        $table->string('airbags', 50)->nullable();
        $table->string('air_conditioning', 50)->nullable();
        $table->boolean('has_alarm_system')->nullable();
        $table->boolean('has_ambient_lighting')->nullable();
        $table->boolean('has_android_auto')->nullable();
        $table->boolean('has_apple_car_play')->nullable();
        $table->boolean('has_arm_rest')->nullable();
        $table->boolean('has_autom_dimming_interior_mirrors')->nullable();
        $table->boolean('has_auxiliary_heating')->nullable();
        $table->boolean('has_bluetooth')->nullable();
        $table->boolean('has_cargo_barrier')->nullable();
        $table->boolean('has_cd_player')->nullable();
        $table->boolean('has_dab_radio')->nullable();
        $table->boolean('has_digital_cockpit')->nullable();
        $table->boolean('has_disabled_accessible')->nullable();
        $table->boolean('has_electric_backseat_adjustments')->nullable();
        $table->boolean('has_electric_seat_adjustment')->nullable();
        $table->boolean('has_seat_adjustment_with_memory_function')->nullable();
        $table->boolean('has_electric_side_mirrors')->nullable();
        $table->boolean('has_electric_windows')->nullable();
        $table->boolean('has_emergency_call_system')->nullable();
        $table->boolean('has_fatigue_warning_system')->nullable();
        $table->boolean('has_fold_flat_passenger_seat')->nullable();
        $table->boolean('has_folding_exterior_mirrors')->nullable();
        $table->boolean('has_hands_free_kit')->nullable();
        $table->boolean('has_head_up_display')->nullable();
        $table->boolean('has_heated_rear_seats')->nullable();
        $table->boolean('has_heated_seats')->nullable();
        $table->boolean('has_heated_steering_wheels')->nullable();
        $table->boolean('has_induction_charging_for_smartphones')->nullable();
        $table->boolean('has_integrated_music_streaming')->nullable();
        $table->boolean('has_isofix')->nullable();
        $table->boolean('has_leather_steering_wheel')->nullable();
        $table->boolean('has_lumbar_support')->nullable();
        $table->boolean('has_massage_seats')->nullable();
        $table->boolean('has_multifunctional_steering_wheel')->nullable();
        $table->boolean('has_navigation_system')->nullable();
        $table->boolean('has_on_board_computer')->nullable();
        $table->boolean('has_paddle_shifters')->nullable();
        $table->boolean('has_passenger_seat_isofix_point')->nullable();
        $table->boolean('has_seat_ventilation')->nullable();
        $table->boolean('has_show_right_hand_drive')->nullable();
        $table->boolean('has_ski_bag')->nullable();
        $table->boolean('has_smokers_package')->nullable();
        $table->boolean('has_sound_system')->nullable();
        $table->boolean('has_sport_seats')->nullable();
        $table->boolean('has_touchscreen')->nullable();
        $table->boolean('has_tuner_radio')->nullable();
        $table->boolean('has_tv')->nullable();
        $table->boolean('has_usb_port')->nullable();
        $table->boolean('has_virtual_side_mirrors')->nullable();
        $table->boolean('has_voice_control')->nullable();
        $table->boolean('has_winter_package')->nullable();
        $table->boolean('has_wlan_wifi_hotspot')->nullable();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_publications');
    }
};

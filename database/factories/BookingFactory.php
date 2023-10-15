<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = '2023-10-23 09:00:00';
        $endDate = '2023-10-23 17:30:00';

        // Convert start and end dates to timestamps
        $startTimestamp = strtotime($startDate);
        $endTimestamp = strtotime($endDate);

        // Loop to generate random datetimes with 30-minute intervals
        $dateTimeList = [];
        $currentTimestamp = $startTimestamp;

        while ($currentTimestamp <= $endTimestamp) {
            $dateTime = date('Y-m-d H:i:s', $currentTimestamp);
            $dateTimeList[] = $dateTime;

            // Add 30 minutes to the current timestamp
            $currentTimestamp += 1800; // 30 minutes in seconds
        }


        $randomDateTime = $this->faker->randomElement($dateTimeList);


        return [
            "name" => $this->faker->name(),
            "email" => $this->faker->email(),
            "phone_number" => $this->faker->phoneNumber(),
            "vehicle_make" => "Audi",
            "vehicle_model" =>  "A4",
            "booking_date" => $randomDateTime
        ];
    }
}

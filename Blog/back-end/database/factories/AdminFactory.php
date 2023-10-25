<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'image_url' => 'images/zayd.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'web_link' => 'https://zaydinani.onrender.com',
            'facebook_link' => 'https://www.facebook.com/zayd.inani/',
            'linkedin_link' => 'https://www.linkedin.com/in/zayd-inani-a23161248/',
            'instagram_link' => 'https://www.instagram.com/zayd_inani',
            'x_link' => 'https://twitter.com/ZaydInani',
            'summary' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit suscipit, nam cupiditate vero officiis.',
        ];
    }
}

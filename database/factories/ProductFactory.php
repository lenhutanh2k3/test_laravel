<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Controllers\ProductController;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model =Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ten_san_pham' => $this->faker->word(),
            'mo_ta' => $this->faker->sentence(),
            'gia' => $this->faker->randomFloat(2, 10, 1000), // Giá ngẫu nhiên từ 10 đến 1000
            'hinh_anh' => $this->faker->imageUrl(640, 480, 'plants', true), // URL ngẫu nhiên cho hình ảnh
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'title' => $this->faker->sentence,  // Dùng sentence cho tiêu đề
            'body' => $this->faker->paragraph,  // Tạo đoạn văn mẫu
            'created_at' => now(),  // Sử dụng đúng tên cột là created_at
            'updated_at' => now(),  // Tự động gán giá trị cho updated_at
        ];
    }
}

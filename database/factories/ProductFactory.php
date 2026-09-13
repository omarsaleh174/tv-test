<?php
namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'title_en' => $this->faker->words(3, true),
            'title_ar' => $this->faker->words(3, true),
            // 'photo' => $this->faker->imageUrl(),
            'minimum_order' => $this->faker->numberBetween(1, 100),
            'order' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'real_price' => $this->faker->randomFloat(2, 10, 1000),
            'code' => $this->faker->unique()->ean13,
            'amount' => $this->faker->numberBetween(1, 1000),
            'description_en' => $this->faker->paragraph,
            'description_ar' => $this->faker->paragraph,
            'unit_id' => \App\Entities\Admin\Unit::first()->id,
            'category_id' => \App\Entities\Admin\Category::first()->id,
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Products;
use Faker\Factory as Faker;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Latest gadgets and electronic devices',
                'products' => [
                    ['name' => 'Smartphone X', 'description' => 'Latest flagship smartphone', 'price' => 999.99, 'stock' => 100],
                    ['name' => 'Laptop Pro', 'description' => 'High-performance laptop', 'price' => 1499.99, 'stock' => 50],
                    ['name' => 'Wireless Earbuds', 'description' => 'True wireless earbuds with noise cancellation', 'price' => 199.99, 'stock' => 200],
                    ['name' => 'Smart Watch', 'description' => 'Fitness and health tracking smartwatch', 'price' => 299.99, 'stock' => 75],
                    ['name' => '4K TV', 'description' => '55-inch 4K Smart TV', 'price' => 799.99, 'stock' => 30],
                ],
            ],
            [
                'name' => 'Home & Kitchen',
                'description' => 'Essential items for your home',
                'products' => [
                    ['name' => 'Coffee Maker', 'description' => 'Programmable coffee maker with grinder', 'price' => 129.99, 'stock' => 60],
                    ['name' => 'Air Fryer', 'description' => 'Digital air fryer for healthy cooking', 'price' => 89.99, 'stock' => 80],
                    ['name' => 'Robot Vacuum', 'description' => 'Smart robot vacuum with mapping', 'price' => 349.99, 'stock' => 40],
                    ['name' => 'Blender', 'description' => 'High-speed blender for smoothies', 'price' => 79.99, 'stock' => 100],
                    ['name' => 'Toaster Oven', 'description' => 'Convection toaster oven', 'price' => 99.99, 'stock' => 70],
                ],
            ],
            [
                'name' => 'Fashion',
                'description' => 'Trendy clothing and accessories',
                'products' => [
                    ['name' => 'Denim Jeans', 'description' => 'Classic fit denim jeans', 'price' => 59.99, 'stock' => 150],
                    ['name' => 'Leather Jacket', 'description' => 'Genuine leather biker jacket', 'price' => 199.99, 'stock' => 30],
                    ['name' => 'Sneakers', 'description' => 'Comfortable running sneakers', 'price' => 89.99, 'stock' => 100],
                    ['name' => 'Sunglasses', 'description' => 'Polarized aviator sunglasses', 'price' => 129.99, 'stock' => 80],
                    ['name' => 'Wristwatch', 'description' => 'Stainless steel analog watch', 'price' => 149.99, 'stock' => 50],
                ],
            ],
            [
                'name' => 'Sports & Outdoors',
                'description' => 'Equipment for sports and outdoor activities',
                'products' => [
                    ['name' => 'Yoga Mat', 'description' => 'Non-slip exercise yoga mat', 'price' => 29.99, 'stock' => 200],
                    ['name' => 'Camping Tent', 'description' => '4-person waterproof tent', 'price' => 149.99, 'stock' => 40],
                    ['name' => 'Bicycle', 'description' => 'Mountain bike with 21 speeds', 'price' => 399.99, 'stock' => 25],
                    ['name' => 'Dumbbells Set', 'description' => 'Adjustable dumbbells set', 'price' => 199.99, 'stock' => 60],
                    ['name' => 'Hiking Backpack', 'description' => '50L waterproof hiking backpack', 'price' => 79.99, 'stock' => 70],
                ],
            ],
            [
                'name' => 'Books',
                'description' => 'Best-selling books across various genres',
                'products' => [
                    ['name' => 'Sci-Fi Novel', 'description' => 'Award-winning science fiction novel', 'price' => 14.99, 'stock' => 100],
                    ['name' => 'Cookbook', 'description' => 'Gourmet recipes from around the world', 'price' => 24.99, 'stock' => 80],
                    ['name' => 'Self-Help Book', 'description' => 'Guide to personal development', 'price' => 19.99, 'stock' => 120],
                    ['name' => 'History Book', 'description' => 'Comprehensive world history', 'price' => 29.99, 'stock' => 60],
                    ['name' => 'Children\'s Book', 'description' => 'Illustrated adventure story for kids', 'price' => 9.99, 'stock' => 150],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create([
                'name' => $categoryData['name'],
                'description' => $categoryData['description'],
            ]);

            foreach ($categoryData['products'] as $productData) {
                Products::create([
                    'name' => $productData['name'],
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'stock' => $productData['stock'],
                    'image_url' => $faker->imageUrl(640, 480, 'products', true),
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}

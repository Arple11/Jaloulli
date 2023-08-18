<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * set values before running the seed
         *
         * @property int     $productCount     new fake products to make
         * @property int     $customersCount   count of new fake customers to make
         * @property int     $sellersCount     count of new fake sellers to make
         * @property int     $ordersCount      count of new fake orders to make
         * @property boolean $forPreviousData  use previous data for making orders
         *
         */

        $productCount = 10;
        $customersCount = 25;
        $sellersCount = 5;
        $ordersCount = 10;
        $forPreviousData = false;

        /**
         * making fake products
         */
        $products = Product::factory($productCount)->create();

        /**
         * using the Previous products if user wants
         */
        if ( $forPreviousData ) {
            $products = Product::all();
        }

        /**
         * checking if customer role exist if not making one
         */
        $customer = Role::where('role_name', 'customer')->first();
        if ( !$customer ) {
            $customer = Role::factory()->create(['role_name' => 'customer']);
        }
        $customers = User::factory()
            ->count($customersCount)
            ->for($customer, 'role')
            ->create();
        /**
         * using the Previous customers if user wants
         */
        if ( $forPreviousData ) {
            $customers = User::where('role_id',
                Role::where('role_name', 'customer')->id)
                ->get();
        }

        /**
         * checking if seller role exist if not making one
         */
        $seller = Role::where('role_name', 'seller')->first();
        if ( !$seller ) {
            $seller = Role::factory()->create(['role_name' => 'seller']);
        }
        $sellers = User::factory()
            ->count($sellersCount)
            ->for($seller, 'role')
            ->create();
        if ( $forPreviousData ) {
            $sellers = User::where('role_id',
                Role::where('role_name', 'seller')->id)
                ->get();
        }

        /**
         * checking if admin role exist if not making one
         */
        $admin = Role::where('role_name', 'admin')->first();
        if ( !$admin ) {
            $admin = Role::factory()->create(['role_name' => 'admin']);
        }
        $admins = User::factory()
            ->for($admin, 'role')
            ->create();

        /**
         * using the Previous customers if user wants
         */
        if ( $forPreviousData ) {
            $admins = User::where('role_id',
                Role::where('role_name', 'admin')->id)
                ->get();
        }

        for ( $i = 0; $i < $ordersCount; $i++ ) {

            $totalPrice = 0;
            $orders = Order::factory()
                ->for($sellers[ rand(0, (count($sellers) - 1)) ], 'seller')
                ->for($customers[ rand(0, (count($customers) - 1)) ], 'customer');

            for ( $k = 0; $k < count($products); $k++ ) {

                $product = $products[ $k ];
                $count = rand(0, $product->amount_available);

                if ( $count > 0 ) {

                    $orders = $orders->hasAttached($product, ['count' => $count]);
                    $totalPrice += $product->price * $count;
                    $product->amount_available -= $count;
                    $product->amount_sold += $count;
                    $product->save();

                }
            }
            $orders = $orders
                ->count(1)
                ->create([
                    'order_total_price' => $totalPrice,
                    'balance' => $totalPrice * -1
                ]);
        }
    }
}

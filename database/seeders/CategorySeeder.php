<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->truncate();

        $usedSlugs = [];

        $generateUniqueSlug = function ($name) use (&$usedSlugs) {
            $baseSlug = Str::slug($name);
            $slug = $baseSlug;
            $counter = 1;

            while (in_array($slug, $usedSlugs)) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $usedSlugs[] = $slug;

            return $slug;
        };

        $mainCategories = [
            'Vehicle Types',
            'Auto Parts & Components',
            'Vehicle Systems',
            'Car Accessories',
            'Performance & Tuning',
            'Maintenance & Repair',
            'Tools & Equipment',
            'Electronics & Technology',
            'Fluids & Chemicals',
            'Tires & Wheels',
        ];

        $mainCategoryIds = [];

        foreach ($mainCategories as $category) {
            $slug = $generateUniqueSlug($category);

            $id = DB::table('categories')->insertGetId([
                'name' => $category,
                'slug' => $slug,
                'parent_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $mainCategoryIds[$category] = $id;
        }

        $subCategories = [
            'Vehicle Types' => [
                'Sedan', 'SUV', 'Truck', 'Coupe', 'Convertible', 'Wagon', 'Hatchback', 'Van', 'Minivan',
                'Crossover', 'Luxury Vehicles', 'Sports Cars', 'Electric Vehicles', 'Hybrid Vehicles',
                'Diesel Vehicles', 'Off-Road Vehicles', 'Commercial Vehicles', 'Compact Cars', 'Mid-Size Cars',
                'Full-Size Cars', 'Pickup Trucks', 'Heavy-Duty Trucks', 'Light-Duty Trucks', 'Classic Cars',
                'Vintage Cars', 'Muscle Cars', 'Performance Cars', 'Economy Cars', 'Subcompact Cars',
                'Micro Cars', 'Limousines', 'RVs & Motorhomes', 'Motorcycles', 'Scooters',
                'ATVs', 'UTVs', 'Go-Karts', 'Golf Carts', 'Snowmobiles',
            ],
            'Auto Parts & Components' => [
                'Engine Parts', 'Transmission Components', 'Drivetrain', 'Suspension', 'Brakes',
                'Cooling Components', 'Exhaust Components', 'Fuel Components', 'Ignition Parts', 'Electrical Parts',
                'HVAC Components', 'Body Parts', 'Interior Components', 'Steering Components', 'Filters',
                'Bearings', 'Gaskets', 'Seals', 'Fasteners', 'Belts',
                'Hoses', 'Pipes', 'Radiators', 'Pumps', 'Motors',
                'Sensors', 'Switches', 'Relays', 'Fuses', 'Wiring',
                'Connectors', 'Mounts', 'Brackets', 'Clips', 'Control Arms',
                'Axles', 'CV Joints', 'Differentials', 'Transfer Cases', 'Clutches',
            ],
            'Vehicle Systems' => [
                'Engine Management System', 'Fuel Delivery System', 'Exhaust Management System', 'Cooling Management System', 'Lubrication System',
                'Electrical Distribution System', 'Ignition Control System', 'Starting System', 'Charging System', 'Transmission System',
                'Clutch System', 'Drivetrain System', 'Suspension System', 'Steering System', 'Brake System',
                'HVAC System', 'Lighting System', 'Safety Systems', 'Security Systems', 'Emissions Control System',
                'Power Management System', 'Battery Management System', 'Hybrid Drive System', 'Infotainment System', 'Navigation System',
                'Audio System', 'Cruise Control System', 'Driver Assistance Systems', 'Comfort Systems', 'Convenience Systems',
            ],
            'Car Accessories' => [
                'Interior Accessories', 'Exterior Accessories', 'Electronics Accessories', 'Travel Accessories', 'Storage Accessories',
                'Security Accessories', 'Safety Accessories', 'Comfort Accessories', 'Style Accessories', 'Utility Accessories',
                'Car Covers', 'Floor Mats', 'Seat Covers', 'Dash Covers', 'Steering Wheel Covers',
                'Sun Shades', 'Cargo Liners', 'Roof Racks', 'Bike Racks', 'Trailer Hitches',
                'Lighting Accessories', 'Window Tint', 'Decorative Trim', 'Emblems & Badges', 'Decals & Stickers',
                'License Plate Frames', 'Keychains', 'Air Fresheners', 'Pet Accessories', 'Weather Protection',
            ],
            'Performance & Tuning' => [
                'Performance Engine Parts', 'Performance Exhaust', 'Performance Intake', 'Turbochargers', 'Superchargers',
                'Performance Chips', 'ECU Tuning', 'Intercoolers', 'Fuel Injection', 'Nitrous Systems',
                'Performance Transmissions', 'Performance Clutches', 'Performance Differentials', 'Limited Slip Differentials', 'Performance Driveshafts',
                'Performance Suspension', 'Lowering Kits', 'Coilovers', 'Sway Bars', 'Strut Towers',
                'Performance Brakes', 'Brake Pads', 'Brake Rotors', 'Brake Lines', 'Brake Fluid',
                'Performance Cooling', 'Oil Coolers', 'Performance Radiators', 'Heat Exchangers', 'Thermal Management',
            ],
            'Maintenance & Repair' => [
                'Oil Change', 'Filter Replacement', 'Tune-Up Services', 'Brake Service', 'Transmission Service',
                'Cooling System Service', 'Battery Service', 'Tire Service', 'Wheel Alignment', 'Suspension Repair',
                'Engine Repair', 'Electrical Repair', 'Body Repair', 'Paint & Finish', 'Glass Repair',
                'Interior Repair', 'Upholstery Repair', 'Detailing', 'Rust Prevention', 'Undercoating',
                'Diagnostic Services', 'Preventive Maintenance', 'Emergency Repair', 'Seasonal Maintenance', 'Fleet Maintenance',
            ],
            'Tools & Equipment' => [
                'Hand Tools', 'Power Tools', 'Specialty Tools', 'Diagnostic Tools', 'Lifting Equipment',
                'Air Tools', 'Welding Equipment', 'Tool Storage', 'Shop Equipment', 'Garage Equipment',
                'Cleaning Equipment', 'Measuring Tools', 'Electrical Tools', 'Body Work Tools', 'Engine Tools',
                'Transmission Tools', 'Brake Tools', 'Suspension Tools', 'Tire Tools', 'Battery Tools',
                'Safety Equipment', 'Work Lights', 'Air Compressors', 'Pressure Washers', 'Generator Equipment',
            ],
            'Electronics & Technology' => [
                'Audio Systems', 'Video Systems', 'Navigation Systems', 'Communication Systems', 'Mobile Electronics',
                'Alarms & Security', 'Remote Starters', 'Keyless Entry', 'Backup Cameras', 'Dash Cameras',
                'Radar Detectors', 'GPS Trackers', 'Bluetooth Devices', 'Mobile Chargers', 'Power Inverters',
                'Gauges & Monitors', 'Heads-Up Displays', 'Telematics Systems', 'On-Board Diagnostics', 'Smartphone Integration',
                'Voice Control Systems', 'Entertainment Systems', 'Driver Assistance Tech', 'LED & HID Technology', 'Automotive Software',
            ],
            'Fluids & Chemicals' => [
                'Engine Oil', 'Transmission Fluid', 'Brake Fluid', 'Power Steering Fluid', 'Coolant & Antifreeze',
                'Windshield Washer Fluid', 'Fuel Additives', 'Oil Additives', 'Lubricants', 'Greases',
                'Cleaners & Degreasers', 'Polishes & Waxes', 'Sealants', 'Adhesives', 'Threadlockers',
                'Rust Inhibitors', 'Paint & Coatings', 'Solvents', 'Gasket Makers', 'Refrigerants',
            ],
            'Tires & Wheels' => [
                'All-Season Tires', 'Summer Tires', 'Winter Tires', 'Off-Road Tires', 'Performance Tires',
                'Truck Tires', 'SUV Tires', 'Run-Flat Tires', 'Low Profile Tires', 'Specialty Tires',
                'Alloy Wheels', 'Steel Wheels', 'Chrome Wheels', 'Forged Wheels', 'Split-Rim Wheels',
                'Beadlock Wheels', 'Wheel Spacers', 'Wheel Adapters', 'Wheel Covers', 'Center Caps',
                'Lug Nuts', 'Valve Stems', 'TPMS Sensors', 'Wheel Weights', 'Wheel Locks',
            ],
        ];

        $subCategoryIds = [];

        foreach ($subCategories as $mainCategory => $subs) {
            foreach ($subs as $subcategory) {
                $slug = $generateUniqueSlug($subcategory);

                $id = DB::table('categories')->insertGetId([
                    'name' => $subcategory,
                    'slug' => $slug,
                    'parent_id' => $mainCategoryIds[$mainCategory],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                $subCategoryIds[$subcategory] = $id;
            }
        }

        $thirdLevelCategories = [
            'Engine Parts' => [
                'Pistons', 'Piston Rings', 'Connecting Rods', 'Crankshafts', 'Camshafts',
                'Valves', 'Valve Springs', 'Valve Guides', 'Valve Seals', 'Lifters',
                'Rocker Arms', 'Push Rods', 'Timing Chains', 'Timing Belts', 'Timing Gears',
                'Oil Pumps', 'Water Pumps', 'Fuel Pumps', 'Engine Bearings', 'Engine Gaskets',
                'Cylinder Heads', 'Engine Blocks', 'Intake Manifolds', 'Exhaust Manifolds', 'Harmonic Balancers',
            ],
            'Suspension System' => [
                'Shock Absorbers', 'Struts', 'Springs', 'Control Arms', 'Ball Joints',
                'Tie Rods', 'Sway Bars', 'Bushings', 'Strut Mounts', 'Air Suspension Components',
                'Leaf Springs', 'Torsion Bars', 'Suspension Lift Kits', 'Lowering Kits', 'Coilovers',
                'Trailing Arms', 'Panhard Bars', 'Track Bars', 'Spindles', 'Knuckles',
            ],
            'Brake System' => [
                'Brake Pads', 'Brake Rotors', 'Brake Drums', 'Brake Shoes', 'Brake Calipers',
                'Brake Lines', 'Brake Hoses', 'Master Cylinders', 'Wheel Cylinders', 'Proportioning Valves',
                'ABS Components', 'Brake Boosters', 'Parking Brake Components', 'Brake Hardware Kits', 'Brake Fluid Reservoirs',
                'Electronic Brake Controllers', 'Brake Light Switches', 'Brake Wear Sensors', 'Brake Dust Shields', 'Brake Pedal Assemblies',
            ],
            'Interior Accessories' => [
                'Seat Covers', 'Floor Mats', 'Dash Covers', 'Steering Wheel Covers', 'Shift Knobs',
                'Pedal Covers', 'Interior Trim Kits', 'Console Organizers', 'Headrest Accessories', 'Sun Visors',
                'Window Shades', 'Cargo Organizers', 'Trunk Organizers', 'Custom Gauges', 'Interior Lights',
                'Interior Door Handles', 'Seat Belt Covers', 'Cup Holders', 'Phone Mounts', 'Trash Bins',
            ],
            'Exterior Accessories' => [
                'Car Covers', 'Bug Deflectors', 'Wind Deflectors', 'Sun Roof Visors', 'Fender Flares',
                'Running Boards', 'Nerf Bars', 'Mud Flaps', 'Splash Guards', 'Hood Scoops',
                'Window Visors', 'Window Tint', 'Car Bras', 'Bumper Guards', 'Light Covers',
                'License Plate Frames', 'Roof Racks', 'Bike Racks', 'Cargo Carriers', 'Hitches',
            ],
            'Performance Engine Parts' => [
                'Performance Camshafts', 'Performance Pistons', 'Performance Connecting Rods', 'Performance Crankshafts', 'Stroker Kits',
                'Cylinder Head Porting', 'Big Valve Kits', 'Performance Valve Springs', 'Roller Rockers', 'Performance Timing Chains',
                'Performance Oil Pumps', 'Dry Sump Systems', 'Fuel Injectors', 'Throttle Bodies', 'Intake Manifolds',
                'Headers', 'Performance Engine Bearings', 'Engine Block Reinforcement', 'Engine Balancing Kits', 'Engine Mounts',
            ],
            'Hand Tools' => [
                'Wrenches', 'Sockets', 'Ratchets', 'Screwdrivers', 'Pliers',
                'Hammers', 'Pry Bars', 'Chisels', 'Files', 'Punches',
                'Multimeters', 'Circuit Testers', 'Tap and Die Sets', 'Torque Wrenches', 'Breaker Bars',
                'Allen Keys', 'Torx Keys', 'Thread Gauges', 'Feeler Gauges', 'Wire Strippers',
            ],
            'Audio Systems' => [
                'Head Units', 'Speakers', 'Subwoofers', 'Amplifiers', 'Equalizers',
                'Sound Processors', 'Audio Installation Kits', 'Speaker Enclosures', 'Crossovers', 'Sound Dampening Materials',
                'Audio Cables', 'Speaker Wire', 'RCA Cables', 'Power Cables', 'Audio Accessories',
                'Bluetooth Adapters', 'FM Transmitters', 'USB Adapters', 'Satellite Radio', 'Digital Media Receivers',
            ],
            'All-Season Tires' => [
                'Passenger All-Season Tires', 'Touring All-Season Tires', 'Highway All-Season Tires', 'Performance All-Season Tires', 'Ultra-High Performance All-Season Tires',
                'All-Weather Tires', 'Crossover/SUV All-Season Tires', 'Truck All-Season Tires', 'All-Terrain All-Season Tires', 'Commercial All-Season Tires',
                'Economy All-Season Tires', 'Mid-Range All-Season Tires', 'Premium All-Season Tires', 'Run-Flat All-Season Tires', 'Eco-Friendly All-Season Tires',
            ],
            'Alloy Wheels' => [
                'Cast Alloy Wheels', 'Forged Alloy Wheels', 'Flow-Formed Alloy Wheels', 'Monoblock Alloy Wheels', 'Multi-Piece Alloy Wheels',
                'Machined Alloy Wheels', 'Painted Alloy Wheels', 'Polished Alloy Wheels', 'Chrome Alloy Wheels', 'Black Alloy Wheels',
                'Bronze Alloy Wheels', 'Gunmetal Alloy Wheels', 'Silver Alloy Wheels', 'Gold Alloy Wheels', 'Custom Color Alloy Wheels',
            ],
        ];

        foreach ($thirdLevelCategories as $parentCategory => $thirdLevels) {
            if (!isset($subCategoryIds[$parentCategory])) {
                continue;
            }

            foreach ($thirdLevels as $thirdLevel) {
                $slug = $generateUniqueSlug($thirdLevel);

                DB::table('categories')->insert([
                    'name' => $thirdLevel,
                    'slug' => $slug,
                    'parent_id' => $subCategoryIds[$parentCategory],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        $automotiveTerms = [
            'OEM', 'Aftermarket', 'Genuine', 'Premium', 'Economy',
            'Heavy-Duty', 'Light-Duty', 'Performance', 'Racing', 'Street',
            'Off-Road', 'All-Terrain', 'Highway', 'Urban', 'Rural',
            'Classic', 'Vintage', 'Modern', 'Custom', 'Universal',
            'Direct-Fit', 'Bolt-On', 'Plug-and-Play', 'DIY', 'Professional',
            'Domestic', 'Import', 'European', 'Asian', 'American',
            'German', 'Japanese', 'Korean', 'Italian', 'British',
            'French', 'Swedish', 'Luxury', 'Budget', 'Mid-Range',
            'Commercial', 'Industrial', 'Passenger', 'Fleet', 'Recreational',
        ];

        $vehicleTypes = [
            'Car', 'Truck', 'SUV', 'Crossover', 'Van',
            'Minivan', 'Pickup', 'Sedan', 'Coupe', 'Convertible',
            'Wagon', 'Hatchback', 'Sports Car', 'Muscle Car', 'Electric Vehicle',
            'Hybrid', 'Diesel', 'Gasoline', 'Alternative Fuel', 'Motorcycle',
            'ATV', 'UTV', 'RV', 'Motorhome', 'Trailer',
        ];

        $brands = [
            'Toyota', 'Honda', 'Ford', 'Chevrolet', 'BMW',
            'Mercedes-Benz', 'Audi', 'Volkswagen', 'Nissan', 'Hyundai',
            'Kia', 'Subaru', 'Mazda', 'Lexus', 'Acura',
            'Infiniti', 'Porsche', 'Ferrari', 'Lamborghini', 'Maserati',
            'Jaguar', 'Land Rover', 'Volvo', 'Tesla', 'Jeep',
            'Ram', 'Dodge', 'Chrysler', 'Buick', 'Cadillac',
            'GMC', 'Lincoln', 'Genesis', 'Fiat', 'Alfa Romeo',
            'Mitsubishi', 'Mini', 'Smart', 'Bentley', 'Rolls-Royce',
            'Aston Martin', 'McLaren', 'Bugatti', 'Koenigsegg', 'Pagani',
        ];

        $currentCount = DB::table('categories')->count();
        $neededCount = 1000 - $currentCount;

        if ($neededCount > 0) {
            $allParentIds = array_merge($mainCategoryIds, $subCategoryIds);
            $parentIdKeys = array_keys($allParentIds);

            for ($i = 0; $i < $neededCount; $i++) {
                $term = $automotiveTerms[array_rand($automotiveTerms)];
                $type = $vehicleTypes[array_rand($vehicleTypes)];
                $brand = $brands[array_rand($brands)];

                $namePatterns = [
                    "$term $type Parts",
                    "$brand $type Components",
                    "$term $brand Accessories",
                    "$brand $term Series",
                    "$type $term Collection",
                    "$brand $term $type Line",
                    "$term Performance for $brand",
                    "$brand $type $term Options",
                    "$term Series for $brand $type",
                    "$brand $term Essentials",
                ];

                $name = $namePatterns[array_rand($namePatterns)];
                $slug = $generateUniqueSlug($name);

                $randomParentKey = $parentIdKeys[array_rand($parentIdKeys)];
                $parentId = $allParentIds[$randomParentKey];

                DB::table('categories')->insert([
                    'name' => $name,
                    'slug' => $slug,
                    'parent_id' => $parentId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}

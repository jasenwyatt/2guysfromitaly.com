<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php do_action( 'bricks_meta_tags' ); ?>
<?php wp_head(); ?>
<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- /Alpine.js -->
</head>
<?php
do_action( 'bricks_body' );
do_action( 'bricks_before_site_wrapper' );
do_action( 'bricks_before_header' );
do_action( 'render_header' );
do_action( 'bricks_after_header' );
?>
<header class="w-full bg-red-500 text-white">
    <nav class="mx-auto flex flex-col md:flex-row items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="flex flex-col md:flex-row gap-2 items-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/two-guys-italy-logo-sq.jpg" alt="Two Guys from Italy Logo" class="rounded-full h-16 md:h-10 w-auto" />
                <h1 class="text-lg font-bold">Two Guys from Italy</h1>
            </a>
        </div>
        <div class="flex py-2 gap-x-4 lg:gap-x-8">
            <a href="#" class="text-2xl font-bold leading-6 uppercase text-white hover:text-gray-200">Menu</a>
            <a href="#" class="text-2xl font-bold leading-6 uppercase text-white hover:text-gray-200">Info</a>
            <a href="#" class="text-2xl font-bold leading-6 uppercase text-white hover:text-gray-200">FAQ</a>
        </div>
        <div class="flex flex-col md:flex-row gap-2 gap-x-3 lg:gap-x-6 lg:flex-1 lg:justify-end">
            <a href="tel:248-398-8111" class="btn btn--black">(248) 398-8111</a>
            <a href="#" class="btn btn--green">Order Online <span aria-hidden="true">&rarr;</span></a>
        </div>
    </nav>
</header>

<section class="bg-white">
  <div class="relative isolate overflow-hidden pt-8">
    <div class="mx-auto max-w-7xl px-6 py-8 sm:py-10 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0 lg:grid lg:max-w-none lg:grid-cols-2 lg:gap-x-16 lg:gap-y-6 xl:grid-cols-1 xl:grid-rows-1 xl:gap-x-8">
            <h1 class="max-w-2xl text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl lg:col-span-2 xl:col-auto">Two Guys from Italy</h1>
            <div class="mt-6 max-w-xl lg:mt-0 xl:col-end-1 xl:row-start-1">
                <p class="text-lg leading-8 text-gray-600">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua. Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.</p>
                <div class="mt-10 flex items-center gap-x-6">
                    <a href="#" class="btn btn--green">Order Online <span aria-hidden="true">&rarr;</span></a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">View Menu <span aria-hidden="true">→</span></a>
                </div>
            </div>
            <img src="https://images.unsplash.com/photo-1576458088443-04a19bb13da6?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="aspect-square w-full max-w-lg rounded-full object-cover lg:max-w-none xl:row-span-2 xl:row-end-2 mt-8">
        </div>
    </div>
  </div>
</secti>

<section class="bg-white">
    <div class="mx-auto max-w-7xl px-6">
        <h2 class="max-w-2xl mb-6 text-3xl lg:text-5xl font-bold tracking-tight text-gray-900">Our Menu</h2>
        <ul class="list-none flex flex-row gap-x-4 overflow-x-auto hide-scroll-bar p-0 m-0 border-t-2 border-b-2 border-x-0 border-solid border-black">
            <li class="text-nowrap py-4">
                <a href="#round-pizza" class="font-bold uppercase text-red-500">Round Pizza</a>
            </li>
            <li class="text-nowrap py-4">
                <a href="#round-specialty-pizza" class="font-bold uppercase text-red-500">Round Specialty Pizza</a>
            </li>
            <li class="text-nowrap py-4">
                <a href="#square-pizza" class="font-bold uppercase text-red-500">Square Pizza</a>
            </li>
        </ul>
    </div>
</section>

<section class="bg-white mx-auto max-w-7xl px-6">
    <h3 id="round-pizza" class="text-2xl font-bold tracking-tight text-gray-900 py-4">Round Pizza</h3>

    <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">
        <div class="group relative flex flex-col overflow-hidden rounded-lg border border-solid border-gray-200 bg-white">
            <div class="flex flex-1 flex-col space-y-4 p-4 min-h-56">
                <h4 class="text-lg font-medium text-gray-900">
                    Single Round Cheese Pizza
                </h4>
                <p class="text-sm text-gray-500">Get the full lineup of our Basic Tees. Have a fresh shirt all week, and an extra for laundry day.</p>
                <div class="flex flex-1 flex-col justify-end">
                    <p class="text-base font-medium text-gray-900">$9.50</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white mx-auto max-w-7xl px-6">
    <h3 id="round-specialty-pizza" class="text-2xl font-bold tracking-tight text-gray-900 py-4">Round Specialty Pizza</h3>

    <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">
        <div class="group relative flex flex-col overflow-hidden rounded-lg border border-solid border-gray-200 bg-white">
            <div class="flex flex-1 flex-col space-y-2 p-4 min-h-56">
                <h4 class="text-lg font-medium text-gray-900">
                    Basic Tee 8-Pack
                </h4>
                <p class="text-sm text-gray-500">Get the full lineup of our Basic Tees. Have a fresh shirt all week, and an extra for laundry day.</p>
                <div class="flex flex-1 flex-col justify-end">
                    <p class="text-base font-medium text-gray-900">$15.50</p>
                </div>
            </div>
        </div>
        <div class="group relative flex flex-col overflow-hidden rounded-lg border border-solid border-gray-200 bg-white">
            <div class="aspect-h-3 aspect-w-4 bg-gray-200 sm:aspect-none group-hover:opacity-75 sm:h-72">
                <img src="https://tailwindui.com/plus/img/ecommerce-images/category-page-02-image-card-01.jpg" alt="Eight shirts arranged on table in black, olive, grey, blue, white, red, mustard, and green." class="h-full w-full object-cover object-center sm:h-full sm:w-full">
            </div>
            <div class="flex flex-1 flex-col space-y-2 p-4 min-h-56">
                <h4 class="text-lg font-medium text-gray-900">
                    Basic Tee 8-Pack
                </h4>
                <p class="text-sm text-gray-500">Get the full lineup of our Basic Tees. Have a fresh shirt all week, and an extra for laundry day.</p>
                <div class="flex flex-1 flex-col justify-end">
                    <p class="text-base font-medium text-gray-900">$15.50</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white mx-auto max-w-7xl px-6">
    <h3 id="square-pizza" class="text-2xl font-bold tracking-tight text-gray-900 py-4">Square Pizza</h3>

    <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">
        <div class="group relative flex flex-col overflow-hidden rounded-lg border border-solid border-gray-200 bg-white">
            <div class="flex flex-1 flex-col space-y-2 p-4 min-h-56">
                <h4 class="text-lg font-medium text-gray-900">
                    Basic Tee 8-Pack
                </h4>
                <p class="text-sm text-gray-500">Get the full lineup of our Basic Tees. Have a fresh shirt all week, and an extra for laundry day.</p>
                <div class="flex flex-1 flex-col justify-end">
                    <p class="text-base font-medium text-gray-900">$15.50</p>
                </div>
            </div>
        </div>
        <div class="group relative flex flex-col overflow-hidden rounded-lg border border-solid border-gray-200 bg-white">
            <div class="aspect-h-3 aspect-w-4 bg-gray-200 sm:aspect-none group-hover:opacity-75 sm:h-72">
                <img src="https://tailwindui.com/plus/img/ecommerce-images/category-page-02-image-card-01.jpg" alt="Eight shirts arranged on table in black, olive, grey, blue, white, red, mustard, and green." class="h-full w-full object-cover object-center sm:h-full sm:w-full">
            </div>
            <div class="flex flex-1 flex-col space-y-2 p-4 min-h-56">
                <h4 class="text-lg font-medium text-gray-900">
                    Basic Tee 8-Pack
                </h4>
                <p class="text-sm text-gray-500">Get the full lineup of our Basic Tees. Have a fresh shirt all week, and an extra for laundry day.</p>
                <div class="flex flex-1 flex-col justify-end">
                    <p class="text-base font-medium text-gray-900">$15.50</p>
                </div>
            </div>
        </div>
        <div class="group relative flex flex-col overflow-hidden rounded-lg border border-solid border-gray-200 bg-white">
            <div class="aspect-h-3 aspect-w-4 bg-gray-200 sm:aspect-none group-hover:opacity-75 sm:h-72">
                <img src="https://tailwindui.com/plus/img/ecommerce-images/category-page-02-image-card-01.jpg" alt="Eight shirts arranged on table in black, olive, grey, blue, white, red, mustard, and green." class="h-full w-full object-cover object-center sm:h-full sm:w-full">
            </div>
            <div class="flex flex-1 flex-col space-y-2 p-4 min-h-56">
                <h4 class="text-lg font-medium text-gray-900">
                    Basic Tee 8-Pack
                </h4>
                <p class="text-sm text-gray-500">Get the full lineup of our Basic Tees. Have a fresh shirt all week, and an extra for laundry day.</p>
                <div class="flex flex-1 flex-col justify-end">
                    <p class="text-base font-medium text-gray-900">$15.50</p>
                </div>
            </div>
        </div>
    </div>
</section>
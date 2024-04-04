<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

<div class="px-4 pt-6">
    <div class="grid grid-cols-3 gap-4 mt-4">
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="p-4 sm:p-6">
                {!! $saleschart->container() !!}
                {!! $saleschart->script() !!} 
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="p-4 sm:p-6">
                {!! $collectibleStocksChart->container() !!}
                {!! $collectibleStocksChart->script() !!}
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="p-4 sm:p-6">
                {!! $projectedUsersChart->container() !!}
                {!! $projectedUsersChart->script() !!}
            </div>
        </div>
    </div>
</div>

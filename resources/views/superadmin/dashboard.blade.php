@extends('layouts.superadmin')

@section('title', 'Superadmin Dashboard')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Business Overview</h1>

    <!-- Filter Tahun -->
    <form method="GET">
        <select name="year" onchange="this.form.submit()"
                class="border rounded px-3 py-2">
            @for($y = now()->year; $y >= now()->year - 4; $y--)
                <option value="{{ $y }}" @selected($year == $y)>
                    {{ $y }}
                </option>
            @endfor
        </select>
    </form>
</div>

<!-- KPI -->
<div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-10">
    @php
        $kpis = [
            ['Total Revenue', $totalRevenue],
            ['Revenue Tahun Ini', $monthlyRevenue],
            ['Total Orders', $totalOrders],
            ['Active Customers', $activeCustomers],
            ['Avg Order Value', $avgOrderValue],
        ];
    @endphp

    @foreach($kpis as [$label, $value])
        <div class="bg-white p-4 rounded shadow">
            <p class="text-gray-500 text-sm">{{ $label }}</p>
            <p class="text-xl font-bold">
                {{ is_numeric($value) ? number_format($value,0,',','.') : $value }}
            </p>
        </div>
    @endforeach
</div>

<!-- Charts -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
    <div class="bg-white p-6 rounded shadow">
        <h3 class="mb-4 font-semibold">Revenue per Month</h3>
        <canvas id="revenueChart"></canvas>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="mb-4 font-semibold">Orders per Month</h3>
        <canvas id="orderChart"></canvas>
    </div>
</div>

<!-- Top Menu -->
<div class="bg-white p-6 rounded shadow">
    <h3 class="mb-4 font-semibold">Top 5 Best Seller Menu</h3>
    <table class="w-full">
        @foreach($topMenus as $menu)
        <tr class="border-b">
            <td class="py-2">{{ $menu->menu->name }}</td>
            <td class="text-right font-semibold">
                {{ $menu->total_sold }} sold
            </td>
        </tr>
        @endforeach
    </table>
</div>

<script>
const revenueData = {
    labels: {!! json_encode($revenuePerMonth->pluck('month')) !!},
    datasets: [{
        label: 'Revenue',
        data: {!! json_encode($revenuePerMonth->pluck('total')) !!},
        tension: 0.4
    }]
};

const orderData = {
    labels: {!! json_encode($orderPerMonth->pluck('month')) !!},
    datasets: [{
        label: 'Orders',
        data: {!! json_encode($orderPerMonth->pluck('total')) !!}
    }]
};

new Chart(document.getElementById('revenueChart'), { type: 'line', data: revenueData });
new Chart(document.getElementById('orderChart'), { type: 'bar', data: orderData });
</script>
@endsection

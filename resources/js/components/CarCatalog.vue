<template>
    <div class="flex flex-col min-h-screen">
        <header class="bg-indigo-600 text-white py-4">
            <div class="container mx-auto flex justify-between items-center px-4">
                <h1 class="text-2xl font-bold">Car Catalog</h1>
                <nav class="space-x-4">
                    <a href="#" class="hover:underline">Home</a>
                    <a href="#" class="hover:underline">Catalog</a>
                    <a href="#" class="hover:underline">About</a>
                    <a href="#" class="hover:underline">Contact</a>
                </nav>
            </div>
        </header>

        <main class="flex-grow container mx-auto p-4">
            <div class="filters mb-6 grid gap-4 p-4 border border-gray-200 rounded-md bg-gray-50">
                <div class="flex flex-col">
                    <label class="font-semibold mb-1">Brand</label>
                    <select v-model="filters.brand" @change="applyFilters" class="border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-indigo-200">
                        <option value="">All</option>
                        <option value="Toyota">Toyota</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label class="font-semibold mb-1">Engine Type</label>
                    <select v-model="filters.engine_type" @change="applyFilters" class="border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-indigo-200">
                        <option value="">All</option>
                        <option value="бензин">Бензин</option>
                        <option value="дизель">Дизель</option>
                        <option value="гибрид">Гибрид</option>
                        <option value="электричка">Электричка</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label class="font-semibold mb-1">Drive Type</label>
                    <select v-model="filters.drive_type" @change="applyFilters" class="border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-indigo-200">
                        <option value="">All</option>
                        <option value="передний">Передний</option>
                        <option value="задний">Задний</option>
                        <option value="полный">Полный</option>
                    </select>
                </div>

                <div class="mt-5">
                    <Slider v-model="yearRange" :min="2000" :max="2023" @input="applyFilters" />
                </div>
                <div class="mt-5">
                    <Slider v-model="priceRange" :min="1000" :max="100000" @input="applyFilters" />
                </div>
            </div>

            <div class="flex items-center mb-4">
                <label for="per_page" class="mr-2">Показать на странице:</label>
                <select v-model="filters.per_page" @change="applyFilters" class="border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-indigo-200">
                    <option value="2" selected>2</option>
                    <option value="3">3</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div v-for="car in cars.data" :key="car.id" class="car-card bg-white p-4 rounded-md shadow mb-4 border border-gray-100">
                <h3 class="text-lg font-semibold">{{ car.brand }} {{ car.model }}</h3>
                <p class="text-gray-600">Year: {{ car.year }}</p>
                <p class="text-gray-600">Price: ${{ car.price }}</p>
            </div>

            <div class="pagination flex justify-center items-center space-x-4 mt-4">
                <button @click="prevPage" :disabled="!cars.meta || cars.meta.current_page === 1" class="px-4 py-2 rounded-md bg-indigo-500 text-white disabled:opacity-50">
                    Previous
                </button>
                <span class="text-gray-600">Page {{ cars.meta ? cars.meta.current_page : 1 }} of {{ cars.meta ? cars.meta.last_page : 1 }}</span>
                <button @click="nextPage" :disabled="!cars.meta || cars.meta.current_page === cars.meta.last_page" class="px-4 py-2 rounded-md bg-indigo-500 text-white disabled:opacity-50">
                    Next
                </button>
            </div>
        </main>

        <footer class="bg-gray-800 text-white py-4">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 Car Catalog. All rights reserved.</p>
                <p class="text-gray-400">Made with Vue.js and Tailwind CSS</p>
            </div>
        </footer>
    </div>
</template>


<script>
import axios from 'axios';
import Slider from '@vueform/slider';
import '@vueform/slider/themes/default.css';

export default {
    components: { Slider },
    data() {
        return {
            cars: [],
            filters: {
                brand: '',
                engine_type: '',
                drive_type: '',
                year_min: 2000,
                year_max: 2023,
                price_min: 1000,
                price_max: 100000,
                per_page: 10,
            },
            page: 1,
            yearRange: [2000, 2023],
            priceRange: [1000, 100000],
        };
    },
    watch: {
        priceRange(newVal) {
            this.filters.price_min = newVal[0];
            this.filters.price_max = newVal[1];
            this.applyFilters();
        },
        yearRange(newVal) {
            this.filters.year_min = newVal[0];
            this.filters.year_max = newVal[1];
            this.applyFilters();
        }
    },
    methods: {
        applyFilters() {
            this.page = 1;
            this.updateURL();
            this.fetchCars();
        },
        fetchCars() {
            axios
                .get('/api/cars', { params: { ...this.filters, page: this.page } })
                .then(response => {
                    this.cars = response.data;
                });
        },
        nextPage() {
            if (this.cars.meta && this.cars.meta.current_page < this.cars.meta.last_page) {
                this.page++;
                this.updateURL();
                this.fetchCars();
            }
        },
        prevPage() {
            if (this.cars.meta && this.cars.meta.current_page > 1) {
                this.page--;
                this.updateURL();
                this.fetchCars();
            }
        },
        updateURL() {
            const queryParams = new URLSearchParams({ ...this.filters, page: this.page }).toString();
            history.pushState(null, '', `?${queryParams}`);
        },
    },
    mounted() {
        const urlParams = new URLSearchParams(window.location.search);

        this.filters.brand = urlParams.get('brand') || '';
        this.filters.engine_type = urlParams.get('engine_type') || '';
        this.filters.drive_type = urlParams.get('drive_type') || '';
        this.filters.year_min = parseInt(urlParams.get('year_min') || this.filters.year_min, 10);
        this.filters.year_max = parseInt(urlParams.get('year_max') || this.filters.year_max, 10);
        this.filters.price_min = parseFloat(urlParams.get('price_min') || this.filters.price_min);
        this.filters.price_max = parseFloat(urlParams.get('price_max') || this.filters.price_max);
        this.filters.per_page = parseInt(urlParams.get('per_page') || this.filters.per_page, 10);
        this.page = parseInt(urlParams.get('page')) || this.page;

        this.yearRange = [this.filters.year_min, this.filters.year_max];
        this.priceRange = [this.filters.price_min, this.filters.price_max];

        this.fetchCars();
    },
};
</script>

<style scoped>
.container {
    max-width: 800px;
}

.filters {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

</style>

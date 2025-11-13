<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard – E‑shrimp</title>
	<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
	@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="antialiased text-zinc-800 bg-white" data-requires-auth="true">
	<div class="min-h-screen grid grid-cols-12">
		<!-- Mobile top bar -->
		<div class="col-span-12 md:hidden flex items-center justify-between px-4 py-4 border-b border-zinc-200">
			<button id="openSidebarBtn" class="px-3 py-2 rounded-lg border border-zinc-300 text-sm">Menu</button>
			<div class="flex items-center gap-2">
				<div class="h-6 w-6 rounded bg-zinc-900"></div>
				<div class="font-semibold">E‑SHRIMP</div>
			</div>
			<a href="/" data-logout class="px-3 py-2 rounded-lg border border-zinc-300 text-sm">Logout</a>
		</div>

		<!-- Sidebar -->
		<aside id="sidebar"
			class="col-span-12 md:col-span-2 border-r border-zinc-200 bg-zinc-50 p-4 md:block hidden fixed inset-y-0 left-0 w-72 z-40 md:static md:w-auto">
			<div class="flex items-center gap-2 mb-6">
				<div class="h-6 w-6 rounded bg-zinc-900"></div>
				<div class="font-semibold">E‑SHRIMP</div>
			</div>
			<nav class="space-y-1 text-sm">
				<a href="#" class="block px-3 py-2 rounded-lg bg-white border border-zinc-200 font-medium">Dashboard</a>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Data Monitoring</a>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Histori Data</a>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Daily Article</a>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Community</a>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Prediksi Pertumbuhan</a>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200">Kesehatan Kolam</a>
			</nav>
			<div class="mt-8">
				<div class="text-xs uppercase text-zinc-500 tracking-wide mb-1">Other</div>
				<a href="#" class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200 text-sm">Profil</a>
				<a href="/" data-logout class="block px-3 py-2 rounded-lg hover:bg-white hover:border border-transparent hover:border-zinc-200 text-sm">Logout</a>
			</div>
		</aside>
		<!-- Backdrop for mobile drawer -->
		<div id="backdrop" class="hidden fixed inset-0 bg-black/30 z-30 md:hidden"></div>

		<main class="col-span-12 md:col-span-10 p-4 sm:p-6 md:ml-0">
			<div class="flex items-center justify-between">
				<h1 class="text-lg sm:text-xl font-semibold">Kolam #1</h1>
				<div class="text-xs sm:text-sm text-zinc-600">
					Last sync: <span id="lastSync">just now</span>
				</div>
			</div>

			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
				<div class="rounded-xl bg-zinc-800 text-white p-4">
					<div class="text-sm text-zinc-300">pH</div>
					<div class="text-2xl font-semibold transition-all duration-300" id="phValue">7.2</div>
					<div class="mt-2 text-xs text-zinc-400">Status: <span id="phStatus">Aman</span></div>
				</div>
				<div class="rounded-xl bg-zinc-800 text-white p-4">
					<div class="text-sm text-zinc-300">Suhu</div>
					<div class="text-2xl font-semibold transition-all duration-300" id="tempValue">28.5°C</div>
					<div class="mt-2 text-xs text-zinc-400">Status: <span id="tempStatus">Aman</span></div>
				</div>
				<div class="rounded-xl bg-zinc-800 text-white p-4">
					<div class="text-sm text-zinc-300">Salinitas</div>
					<div class="text-2xl font-semibold transition-all duration-300" id="salinityValue">15.2‰</div>
					<div class="mt-2 text-xs text-zinc-400">Status: <span id="salinityStatus">Stabil</span></div>
				</div>
				<div class="rounded-xl bg-zinc-800 text-white p-4">
					<div class="text-sm text-zinc-300">Oksigen Terlarut</div>
					<div class="text-2xl font-semibold transition-all duration-300" id="doValue">7.2</div>
					<div class="mt-2 text-xs text-zinc-400">Status: <span id="doStatus">Baik</span></div>
				</div>
			</div>

			<div class="mt-6 rounded-2xl border border-zinc-200 overflow-hidden">
				<div class="px-4 py-3 border-b border-zinc-200 font-semibold text-sm sm:text-base">Grafik Real‑time</div>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
					<div class="h-48 sm:h-56 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-400 text-sm">
						Chart placeholder - pH Trend
					</div>
					<div class="h-48 sm:h-56 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-400 text-sm">
						Chart placeholder - Temperature Trend
					</div>
				</div>
			</div>

			<div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
				<div class="rounded-2xl border border-zinc-200">
					<div class="px-4 py-3 border-b border-zinc-200 font-semibold text-sm sm:text-base">Aktivitas</div>
					<ul id="activityList" class="p-4 text-sm text-zinc-700 space-y-2">
						<li>• Pakan dijadwalkan pukul 17:00</li>
						<li>• Boat menyelesaikan rute patroli</li>
						<li>• pH turun sementara, kembali stabil</li>
					</ul>
				</div>
				<div class="rounded-2xl border border-zinc-200">
					<div class="px-4 py-3 border-b border-zinc-200 font-semibold text-sm sm:text-base">Catatan</div>
					<div class="p-4 text-sm text-zinc-700 leading-relaxed">
						Tambahkan catatan harian terkait tindakan, pengamatan, atau perawatan.
					</div>
				</div>
			</div>
		</main>
	</div>
	<script>
		// Sidebar mobile toggle
		const sidebar = document.getElementById('sidebar');
		const openBtn = document.getElementById('openSidebarBtn');
		const backdrop = document.getElementById('backdrop');
		function openSidebar() {
			sidebar.classList.remove('hidden');
			backdrop.classList.remove('hidden');
		}
		function closeSidebar() {
			sidebar.classList.add('hidden');
			backdrop.classList.add('hidden');
		}
		openBtn && openBtn.addEventListener('click', openSidebar);
		backdrop && backdrop.addEventListener('click', closeSidebar);
		window.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeSidebar(); });

		// Dummy data generator and updater
		class DashboardDataUpdater {
			constructor() {
				// Base values (realistic ranges for shrimp farming)
				this.baseValues = {
					ph: 7.2,
					temperature: 28.5,
					salinity: 15.2,
					do: 7.2
				};
				this.updateInterval = 3000; // Update every 3 seconds
				this.activityMessages = [
					'Pakan dijadwalkan pukul 17:00',
					'Boat menyelesaikan rute patroli',
					'pH turun sementara, kembali stabil',
					'Pembaruan data sensor selesai',
					'Kualitas air dalam batas normal',
					'Monitoring rutin kolam #1',
					'Suhu air stabil',
					'Oksigen terlarut optimal'
				];
				this.init();
			}

			init() {
				this.updateData();
				setInterval(() => this.updateData(), this.updateInterval);
				this.updateLastSync();
				setInterval(() => this.updateLastSync(), 1000);
			}

			// Generate random value within realistic range
			randomInRange(min, max, current, variance = 0.3) {
				const change = (Math.random() - 0.5) * variance;
				const newValue = current + change;
				return Math.max(min, Math.min(max, newValue));
			}

			getStatus(value, type) {
				switch(type) {
					case 'ph':
						if (value >= 7.0 && value <= 8.5) return 'Aman';
						if (value < 7.0) return 'Asam';
						return 'Basa';
					case 'temp':
						if (value >= 26 && value <= 32) return 'Aman';
						if (value < 26) return 'Dingin';
						return 'Panas';
					case 'salinity':
						if (value >= 10 && value <= 20) return 'Stabil';
						if (value < 10) return 'Rendah';
						return 'Tinggi';
					case 'do':
						if (value >= 5 && value <= 10) return 'Baik';
						if (value < 5) return 'Rendah';
						return 'Tinggi';
					default:
						return 'Normal';
				}
			}

			updateValue(elementId, newValue, suffix = '') {
				const element = document.getElementById(elementId);
				if (element) {
					element.style.transform = 'scale(1.1)';
					element.style.color = '#fbbf24';
					setTimeout(() => {
						element.textContent = newValue.toFixed(1) + suffix;
						element.style.transform = 'scale(1)';
						element.style.color = '';
					}, 150);
				}
			}

			updateStatus(elementId, status) {
				const element = document.getElementById(elementId);
				if (element) {
					element.textContent = status;
				}
			}

			updateData() {
				// Update pH (range: 6.5 - 9.0)
				const newPh = this.randomInRange(6.5, 9.0, this.baseValues.ph, 0.2);
				this.baseValues.ph = newPh;
				this.updateValue('phValue', newPh);
				this.updateStatus('phStatus', this.getStatus(newPh, 'ph'));

				// Update Temperature (range: 24 - 35)
				const newTemp = this.randomInRange(24, 35, this.baseValues.temperature, 0.5);
				this.baseValues.temperature = newTemp;
				this.updateValue('tempValue', newTemp, '°C');
				this.updateStatus('tempStatus', this.getStatus(newTemp, 'temp'));

				// Update Salinity (range: 10 - 25)
				const newSalinity = this.randomInRange(10, 25, this.baseValues.salinity, 0.4);
				this.baseValues.salinity = newSalinity;
				this.updateValue('salinityValue', newSalinity, '‰');
				this.updateStatus('salinityStatus', this.getStatus(newSalinity, 'salinity'));

				// Update Dissolved Oxygen (range: 4 - 10)
				const newDo = this.randomInRange(4, 10, this.baseValues.do, 0.3);
				this.baseValues.do = newDo;
				this.updateValue('doValue', newDo);
				this.updateStatus('doStatus', this.getStatus(newDo, 'do'));

				// Occasionally add new activity
				if (Math.random() > 0.7) {
					this.addActivity();
				}
			}

			addActivity() {
				const activityList = document.getElementById('activityList');
				if (activityList && activityList.children.length > 0) {
					const messages = this.activityMessages;
					const randomMsg = messages[Math.floor(Math.random() * messages.length)];
					const time = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
					const newItem = document.createElement('li');
					newItem.textContent = `• [${time}] ${randomMsg}`;
					newItem.className = 'animate-pulse';
					activityList.insertBefore(newItem, activityList.firstChild);
					if (activityList.children.length > 5) {
						activityList.removeChild(activityList.lastChild);
					}
					setTimeout(() => {
						newItem.classList.remove('animate-pulse');
					}, 2000);
				}
			}

			updateLastSync() {
				const syncElement = document.getElementById('lastSync');
				if (syncElement) {
					const now = new Date();
					const timeStr = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
					syncElement.textContent = timeStr;
				}
			}
		}

		// Initialize dashboard updater when page loads
		document.addEventListener('DOMContentLoaded', () => {
			new DashboardDataUpdater();
		});
	</script>
</body>
</html>

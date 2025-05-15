<?php
include "service/database.php";

// Query default untuk menampilkan semua data
$sql = "SELECT * FROM animal";

// Jika ada pencarian
if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM animal WHERE nama_hewan LIKE '%$search%' OR tentang_hewan LIKE '%$search%'";
}

$result = $db->query($sql);
?>

<div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="backdrop-blur-sm bg-black/20 rounded-xl shadow-2xl p-8">
        <h2 class="text-4xl font-bold text-white mb-8">Cari Kehidupan Laut</h2>
        
        <!-- Search Bar -->
        <div class="max-w-3xl mx-auto mb-12">
            <form method="GET" class="relative">
                <input type="text" 
                       name="search"
                       class="w-full bg-black/30 text-white border border-gray-500 rounded-full px-6 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Cari spesies laut..."
                       value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700">
                    Cari
                </button>
            </form>
        </div>

        <!-- Search Results -->
        <div class="grid md:grid-cols-3 gap-6">
            <?php 
            if($result->num_rows > 0):
                while($row = $result->fetch_assoc()):
            ?>
            <!-- Result Card -->
            <div class="backdrop-blur-sm bg-black/10 rounded-lg overflow-hidden">
                <img src="assets/images/<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_hewan']; ?>" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-white mb-2"><?php echo $row['nama_hewan']; ?></h3>
                    <p class="text-gray-200 text-sm mb-4"><?php echo substr($row['tentang_hewan'], 0, 10); ?>...</p>
                    <button onclick="showModal(<?php echo $row['id']; ?>, '<?php echo htmlspecialchars($row['nama_hewan'], ENT_QUOTES); ?>', '<?php echo htmlspecialchars($row['tentang_hewan'], ENT_QUOTES); ?>', '<?php echo $row['gambar']; ?>')" class="text-blue-400 hover:text-blue-300 text-sm">Pelajari Lebih Lanjut →</button>
                </div>
            </div>
            <?php 
                endwhile;
            else:
            ?>
            <div class="col-span-3 text-center text-white">
                <p>Tidak ada data yang ditemukan</p>
            </div>
            <?php endif; ?>
        </div>

        <!-- Modal -->
        <div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="backdrop-blur-sm bg-black/20 rounded-lg p-8 max-w-4xl w-full mx-4">
                <div class="flex justify-between items-center mb-6">
                    <h3 id="modalTitle" class="text-2xl font-bold text-white"></h3>
                    <button onclick="hideModal()" class="text-white hover:text-gray-200">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="md:w-1/2">
                        <img id="modalImage" class="w-full h-96 object-cover rounded-lg" src="" alt="">
                    </div>
                    <div class="md:w-1/2">
                        <div class="prose prose-invert">
                            <div id="modalDescription" class="text-white text-lg leading-relaxed h-96 overflow-y-auto pr-4" style="scrollbar-width: thin; scrollbar-color: rgba(255,255,255,0.3) transparent;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 text-right">
                    <button onclick="hideModal()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Tutup
                    </button>
                </div>
            </div>
        </div>

        <script>
            function showModal(id, nama, tentang, gambar) {
                // Decode HTML entities sebelum menampilkan
                const decodedNama = decodeHTMLEntities(nama);
                const decodedTentang = decodeHTMLEntities(tentang);
                
                document.getElementById('modalTitle').textContent = decodedNama;
                document.getElementById('modalDescription').textContent = decodedTentang;
                document.getElementById('modalImage').src = 'assets/images/' + gambar;
                document.getElementById('modalImage').alt = decodedNama;
                document.getElementById('detailModal').classList.remove('hidden');
            }

            function hideModal() {
                document.getElementById('detailModal').classList.add('hidden');
            }

            function decodeHTMLEntities(text) {
                const textarea = document.createElement('textarea');
                textarea.innerHTML = text;
                return textarea.value;
            }
        </script>
    </div>
</div>

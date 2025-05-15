<div class="relative">
    <?php
    // Pastikan database sudah terkoneksi
    require_once "service/database.php";
    
    // Tambahkan error reporting untuk debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $sql = "SELECT * FROM animal";
    $result = $db->query($sql);

    if (!$result) {
        // Tampilkan error database jika query gagal
        echo "Error: " . $db->error;
    }

    // Inisialisasi variabel
    $total_items = $result->num_rows;
    $items_per_page = 3;
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 0;
    $total_pages = ceil($total_items / $items_per_page);

    // Pastikan current_page dalam range yang valid
    if($current_page >= $total_pages) {
        $current_page = 0;
    }
    if($current_page < 0) {
        $current_page = $total_pages - 1;
    }

    // Query untuk mengambil semua data
    $sql = "SELECT * FROM animal";
    $result = $db->query($sql);
    ?>

    <div class="flex items-center">
        <?php if ($total_items > 3): ?>
            <button onclick="slidePage('left')"
               class="bg-blue-600/70 text-white px-4 py-2 rounded-full hover:bg-blue-700/90 mr-4">
                &lt;
            </button>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 flex-grow transition-transform duration-500" id="animal-container">
            <?php
            if ($result && $result->num_rows > 0):
                $all_data = array();
                while ($row = $result->fetch_assoc()):
                    $all_data[] = $row;
                endwhile;
                
                // Hanya tampilkan 3 data sesuai halaman saat ini
                $start_idx = $current_page * $items_per_page;
                for($i = $start_idx; $i < min($start_idx + $items_per_page, count($all_data)); $i++):
                    $row = $all_data[$i];
            ?>
                    <div class="backdrop-blur-sm bg-black/10 rounded-lg overflow-hidden">
                        <img src="assets/images/<?php echo htmlspecialchars($row['gambar']); ?>" 
                             alt="<?php echo htmlspecialchars($row['nama_hewan']); ?>" 
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-white mb-2">
                                <?php echo htmlspecialchars($row['nama_hewan']); ?>
                            </h3>
                            <p class="text-gray-200 text-sm">
                                <?php echo htmlspecialchars(substr($row['tentang_hewan'], 0, 100)); ?>...
                            </p>
                        </div>
                    </div>
                <?php
                endfor;
                
                // Simpan semua data dalam format JSON untuk digunakan JavaScript
                $json_data = json_encode($all_data);
                echo "<script>const allAnimalData = " . $json_data . ";</script>";
            else:
                ?>
                <div class="col-span-3 text-center text-white">
                    <p>Tidak ada data hewan yang ditemukan</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($total_items > 3): ?>
            <button onclick="slidePage('right')"
               class="bg-blue-600/70 text-white px-4 py-2 rounded-full hover:bg-blue-700/90 ml-4">
                &gt;
            </button>
        <?php endif; ?>
    </div>

    <script>
        let currentPage = <?php echo $current_page; ?>;
        const itemsPerPage = 3;
        const totalPages = Math.ceil(allAnimalData.length / itemsPerPage);
        let autoScrollInterval;
        
        function startAutoScroll() {
            autoScrollInterval = setInterval(() => {
                slidePage('right');
            }, 3000);
        }

        function stopAutoScroll() {
            clearInterval(autoScrollInterval);
        }

        function updateDisplay() {
            const container = document.getElementById('animal-container');
            const startIdx = currentPage * itemsPerPage;
            let html = '';
            
            for(let i = startIdx; i < Math.min(startIdx + itemsPerPage, allAnimalData.length); i++) {
                const animal = allAnimalData[i];
                html += `
                    <div class="backdrop-blur-sm bg-black/10 rounded-lg overflow-hidden">
                        <img src="assets/images/${animal.gambar}" 
                             alt="${animal.nama_hewan}" 
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-white mb-2">
                                ${animal.nama_hewan}
                            </h3>
                            <p class="text-gray-200 text-sm">
                                ${animal.tentang_hewan.substring(0, 100)}...
                            </p>
                        </div>
                    </div>
                `;
            }
            
            container.innerHTML = html;
        }

        function slidePage(direction) {
            const container = document.getElementById('animal-container');
            container.style.opacity = '0';
            
            setTimeout(() => {
                if(direction === 'right') {
                    currentPage = (currentPage + 1) % totalPages;
                } else {
                    currentPage = (currentPage - 1 + totalPages) % totalPages;
                }
                
                updateDisplay();
                container.style.opacity = '1';
            }, 300);
        }

        startAutoScroll();

        document.getElementById('animal-container').addEventListener('mouseenter', stopAutoScroll);
        document.getElementById('animal-container').addEventListener('mouseleave', startAutoScroll);
    </script>
</div>
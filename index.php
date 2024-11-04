<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Virtual Tour Kampus</title>
    <!-- Link CDN CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Link CDN CSS Pannellum -->
    <link rel="stylesheet" href="https://cdn.pannellum.org/2.5/pannellum.css">

    <!-- Link CDN JS Pannellum -->
    <script src="https://cdn.pannellum.org/2.5/pannellum.js"></script>
    
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang */
        }
        #panorama-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        #panorama {
            width: 100%;
            height: 70vh;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #e9ecef; /* Warna latar belakang untuk panorama */
        }
        select.form-control {
            border: 1px solid #007bff; /* Warna border dropdown */
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #007bff; /* Warna tombol */
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Warna tombol saat hover */
        }

        @media (orientation: portrait) {
        #panorama {
            height: 50vh; /* Ubah tinggi untuk perangkat vertikal */
        }
}
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Konten Utama -->
        <div class="text-center mb-4">
            <h1>Virtual Tour Kampus</h1>
            <p class="lead">Jelajahi kampus kami dengan tur virtual interaktif.</p>
        </div>
        
        <div class="form-group">
            <label for="sceneSelect">Pilih Lokasi Awal</label>
            <select class="form-control" id="sceneSelect" onchange="changeScene(this.value)">
                <option value="" selected disabled>Pilih Lokasi</option>
                <option value="gazebo-tengah">Gazebo Tengah</option>
                <option value="parkiran1">Parkiran Depan</option>
                <option value="parkiran2">Parkiran Belakang</option>
                <option value="parkirBelakang1">Parkiran Belakang 1</option>
                <option value="parkirBelakang2">Parkiran Belakang 2</option>
            </select>
        </div>

        <div id="panorama-container">
            <div id="panorama"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="modalContent">Konten informasi akan ditampilkan di sini.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const viewer = pannellum.viewer('panorama', {
            "default": {
                "hfov": 100, // Menyesuaikan FOV
                "firstScene": "parkirBelakang2", 
                "sceneFadeDuration": 1000
            },
            "scenes": {
                "gazebo-tengah": {
                    "panorama": "img/DepanGazeboTengah.png",
                    "autoLoad": true,
                    "yaw": 120,
                    "hotSpots": [
                        {
                            "pitch": 0, 
                            "yaw": 90,  
                            "type": "scene",
                            "text": "Parkiran",
                            "sceneId": "parkiran1",
                            "targetYaw": 30
                        }
                    ]
                },
                "parkiran1": {
                    "panorama": "img/Parkiran1.png",
                    "yaw": -45,
                    "hotSpots": [
                        {
                            "pitch": 0,
                            "yaw": 10,
                            "type": "scene",
                            "text": "Kembali ke Gazebo Tengah",
                            "sceneId": "gazebo-tengah",
                            "targetYaw": 120
                        },
                        {
                            "pitch": -2, 
                            "yaw": 185,  
                            "type": "scene",
                            "text": "Parkiran",
                            "sceneId": "parkiran2",
                            "targetYaw": 30
                        },
                        {
                            "pitch": 0,
                            "yaw": 90,
                            "type": "info",
                            "text": "Informasi Parkiran",
                            "clickHandlerFunc": showModal,
                            "clickHandlerArgs": {
                                "title": "Informasi Parkiran",
                                "content": "Ini adalah informasi tentang parkiran kampus."
                            }
                        },
                        {
                            "pitch": 0,
                            "yaw": -75,
                            "type": "info",
                            "text": "Informasi Takremas",
                            "clickHandlerFunc": showModal,
                            "clickHandlerArgs": {
                                "title": "Informasi Takremas",
                                "content": "Takremas adalah tempat srodot srodot."
                            }
                        }
                    ]
                },
                // Scene parkiran 2
                "parkiran2": {
                    "panorama": "img/Parkiran2.png",
                    "autoLoad": true,
                    "yaw": 0,
                    "hotSpots": [
                        {
                            "pitch": -2, 
                            "yaw": 0,  
                            "type": "scene",
                            "text": "Parkiran",
                            "sceneId": "parkiran1",
                            "targetYaw": 30
                        },
                        {
                            "pitch": -2, 
                            "yaw": 185,  
                            "type": "scene",
                            "text": "Parkiran Belakang",
                            "sceneId": "parkirBelakang1",
                            "targetYaw": 30
                        }
                    ]
                },

                // Scene parkiran Belakang 1
                "parkirBelakang1": {
                    "panorama": "img/ParkirBelakang1.png",
                    "autoLoad": true,
                    "yaw": 0,
                    "hotSpots": [
                        {
                            "pitch": 0, 
                            "yaw": 0,  
                            "type": "scene",
                            "text": "Parkiran",
                            "sceneId": "parkiran2",
                            "targetYaw": 30
                        },
                        {
                            "pitch": 0, 
                            "yaw": 230,  
                            "type": "scene",
                            "text": "Parkiran Belakang",
                            "sceneId": "parkirBelakang2",
                            "targetYaw": 30
                        }
                    ]
                },

                // Scene parkiran Belakang 2
                "parkirBelakang2": {
                    "panorama": "img/ParkirBelakang2.png",
                    "autoLoad": true,
                    "yaw": 0,
                    "hotSpots": [
                        {
                            "pitch": 0, 
                            "yaw": 60,  
                            "type": "scene",
                            "text": "Parkiran",
                            "sceneId": "parkirBelakang1",
                            "targetYaw": 30
                        }                        
                    ]
                },
            }
        });

        // Function to show modal
        function showModal(_, args) {
            document.getElementById("modalTitle").innerText = args.title;
            document.getElementById("modalContent").innerText = args.content;
            $('#infoModal').modal('show'); // Menampilkan modal
        }

        // Function to change scene based on dropdown selection
        function changeScene(sceneId) {
            if (sceneId) {
                viewer.loadScene(sceneId);
            }
        }
    </script>

    <!-- Link JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

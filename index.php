<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Tour Kampus</title>
    <!-- Link CDN CSS Pannellum -->
    <link rel="stylesheet" href="https://cdn.pannellum.org/2.5/pannellum.css">

    <!-- Link CDN JS Pannellum -->
    <script src="https://cdn.pannellum.org/2.5/pannellum.js"></script>
    <style>
        #panorama {
            width: 100%;
            height: 100vh;
        }
        /* Modal styling */
        #infoModal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 500px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 8px;
            z-index: 1000;
        }
        #infoModal h2 {
            margin-top: 0;
        }
        #modalOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        #closeModal {
            cursor: pointer;
            color: #888;
            float: right;
            font-size: 24px;
            margin-top: -10px;
        }
    </style>
</head>
<body>
    <div id="panorama"></div>

    <!-- Modal Overlay -->
    <div id="modalOverlay"></div>
    
    <!-- Modal -->
    <div id="infoModal">
        <span id="closeModal">&times;</span>
        <h2 id="modalTitle">Informasi</h2>
        <p id="modalContent">Konten informasi akan ditampilkan di sini.</p>
    </div>
    
    <script>
        pannellum.viewer('panorama', {
            "default": {
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

                // Scene parkiran Belakang 1
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
            document.getElementById("infoModal").style.display = "block";
            document.getElementById("modalOverlay").style.display = "block";
        }

        // Close modal when close button or overlay is clicked
        document.getElementById("closeModal").onclick = function() {
            document.getElementById("infoModal").style.display = "none";
            document.getElementById("modalOverlay").style.display = "none";
        };
        document.getElementById("modalOverlay").onclick = function() {
            document.getElementById("infoModal").style.display = "none";
            document.getElementById("modalOverlay").style.display = "none";
        };
    </script>
</body>
</html>

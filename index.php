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
    </style>
</head>
<body>
    <div id="panorama"></div>
    
    <script>
        pannellum.viewer('panorama', {
            "default": {
                "firstScene": "campus-entrance",  // Menentukan pemandangan awal saat pertama kali di-load
                "sceneFadeDuration": 1000         // Durasi transisi antar scene
            },
            "scenes": {
                "campus-entrance": {
                    "panorama": "img/Parkiran.jpg",
                    "autoLoad": true,
                    "hotSpots": [
                        {
                            "pitch": 20, 
                            "yaw": 90,  
                            "type": "scene",
                            "text": "Masuk ke Lobi",
                            "sceneId": "lobby"
                        }
                    ]
                },
                "lobby": {
                    "panorama": "img/Panorama1.png",
                    "hotSpots": [
                        {
                            "pitch": 5,
                            "yaw": 180,
                            "type": "scene",
                            "text": "Kembali ke Gerbang Kampus",
                            "sceneId": "campus-entrance"
                        },
                        {
                            "pitch": 10,
                            "yaw": 90,
                            "type": "info",
                            "text": "Informasi Ruangan",
                            "URL": "https://example.com/info-room"
                        }
                    ]
                }
            }
        });
    </script>
</body>
</html>

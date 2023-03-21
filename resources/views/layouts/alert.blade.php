   <style>
       .alert {
           display: none;
           position: fixed;
           z-index: 1;
           left: 0;
           top: 0;
           width: 100%;
           height: 100%;
           overflow: auto;
           background-color: rgba(0, 0, 0, 0.4);
       }

       .isi-alert {
           background-color: #fefefe;
           margin: 15% auto;
           padding: 20px;
           border: 1px solid #888;
           width: 300px;
       }

       .close {
           color: #aaa;
           float: right;
           font-size: 28px;
           font-weight: bold;
       }

       .close:hover,
       .close:focus {
           color: black;
           text-decoration: none;
           cursor: pointer;
       }
   </style>
   <script>
       // Dapatkan elemen Alert
       var Alert = document.getElementById("iniAlert");

       // Dapatkan elemen tombol penutup
       var closeBtn = document.getElementsByClassName("close")[0];

       // Ketika pengguna mengklik tombol penutup, tutup Alert
       closeBtn.onclick = function() {
           Alert.style.display = "none";
           window.livewire.emit('DeleteSession');
       }


       // Ketika pengguna mengklik tombol untuk membuka Alert, tampilkan Alert
       function openAlert() {
           Alert.style.display = "block";
       }
   </script>
   <p>{{ session('success') }}</p>

   <div id="iniAlert" class="alert">
       <div class="isi-alert">
            <span>
                <span class="close">&times;</span>
            </span>
           <p class="message"></p>
       </div>
   </div>
   @if (session()->has('success'))
       <script>
           const paragraph = document.querySelector('p.message');
           paragraph.textContent = "{{ session('success') }}";
           openAlert();
       </script>
   @endif

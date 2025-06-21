<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMoney - Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
	<!-- css login -->
	<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <!-- Left Side - Welcome Section -->
        <div class="login-left">
            <div class="logo">
                <i class="fas fa-wallet"></i>
                MyMoney
            </div>
            
            <div class="welcome-text">
                <h2>Kelola Keuangan Pribadi dengan Mudah</h2>
                <p>Aplikasi keuangan pribadi yang membantu Anda mengatur budget, melacak pengeluaran, dan mencapai tujuan finansial.</p>
            </div>

            <div class="features">
                <div class="feature-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Analisis keuangan real-time</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-piggy-bank"></i>
                    <span>Tracking tabungan & investasi</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-mobile-alt"></i>
                    <span>Akses di mana saja, kapan saja</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Keamanan data terjamin</span>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-right">


            <form class="login-form" method="post" action="<?=base_url('login/process')?>">
                <h3>Masuk ke Akun Anda</h3>
                
                <!-- Alert Messages -->
                <div class="alert alert-success" id="successAlert">
                    <i class="fas fa-check-circle me-2"></i>
                    <span id="successMessage"></span>
                </div>
                
                <div class="alert alert-danger" id="errorAlert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <span id="errorMessage"></span>
                </div>

                <!-- Email Input -->
                <div class="form-group">
                    <label class="form-label">Username :</label>
                    <div class="position-relative">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        <div class="invalid-feedback"></div>
                        <div class="valid-feedback">
						</div>
					</div>
				</div>
				<div class="form-group">
                    <label class="form-label">Password :</label>
                    <div class="position-relative">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-login">Login</button><br><br>

                <!-- Register Link -->
                Belum punya akun?<a href="#" class="register-link"> Daftar di sini</a>
			</form>
		</div>
	</div>

        <!-- SweetAlert2 CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Sound function -->
        <script>
        function playSound(url) {
            const audio = new Audio(url);
            audio.play();
        }
        </script>

        <?php if ($this->session->flashdata('error')): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: '<?= $this->session->flashdata('error') ?>',
                });
                playSound('<?= base_url("assets/sound/MemeSound.mp3") ?>');
            });
        </script>
        <?php endif; ?>

        
</body>
</html>


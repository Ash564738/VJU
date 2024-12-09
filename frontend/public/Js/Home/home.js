const waitForNavigation = async () => {
    while (
        !document.querySelector('.dangnhap') ||
        !document.querySelector('.login-container') ||
        !document.querySelector('.close-btn')
    ) {
        await new Promise((resolve) => setTimeout(resolve, 100)); // Đợi 100ms và kiểm tra lại
    }
  };
  
  document.addEventListener('DOMContentLoaded', async () => { // Thêm async vào đây
    await waitForNavigation(); // Chờ các phần tử xuất hiện
  
    const loginButton = document.querySelector('.dangnhap');
    const loginContainer = document.querySelector('.login-container');
    const overlay = document.querySelector('.overlay-login-container');
    const closeButton = document.querySelector('.close-btn');
    const body = document.body;
  
    if (!loginButton) {
        console.error('Không tìm thấy nút đăng nhập (.dangnhap). Kiểm tra HTML.');
    }
    if (!loginContainer) {
        console.error('Không tìm thấy container đăng nhập (.login-container). Kiểm tra HTML.');
    }
    if (!overlay) {
        console.error('Không tìm thấy overlay (.overlay-login-container). Kiểm tra HTML.');
    }
    if (!closeButton) {
        console.error('Không tìm thấy nút đóng (.close-btn). Kiểm tra HTML.');
    }
  
    if (loginButton && loginContainer && overlay && closeButton) {
        // Hiển thị overlay và login container
        loginButton.addEventListener('click', () => {
            overlay.style.display = 'block';
            loginContainer.style.display = 'block';
            body.classList.add('overlay-active');
        });
  
        // Ẩn overlay và login container khi nhấn nút đóng
        closeButton.addEventListener('click', () => {
            overlay.style.display = 'none';
            loginContainer.style.display = 'none';
            body.classList.remove('overlay-active');
        });
  
        // Ẩn overlay và login container khi nhấn ra ngoài
        overlay.addEventListener('click', () => {
            overlay.style.display = 'none';
            loginContainer.style.display = 'none';
            body.classList.remove('overlay-active');
        });
    } else {
        console.error('Một hoặc nhiều phần tử cần thiết không được tìm thấy. Kiểm tra HTML.');
    }
  });
  
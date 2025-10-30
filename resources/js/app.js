import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    // Chỉ thực thi code nếu các phần tử này tồn tại trên trang hiện tại
    const descriptionContainer = document.getElementById(
        "descriptionContainer"
    );
    const collapseElement = document.getElementById("descriptionContent");
    const toggleButton = document.getElementById("toggleDescriptionBtn");

    if (descriptionContainer && collapseElement && toggleButton) {
        // Lắng nghe sự kiện khi nội dung BẮT ĐẦU MỞ RỘNG
        collapseElement.addEventListener("show.bs.collapse", function () {
            toggleButton.innerHTML =
                'Thu gọn <i class="fas fa-chevron-up fa-xs"></i>';
            descriptionContainer.classList.add("expanded");
        });

        // Lắng nghe sự kiện khi nội dung BẮT ĐẦU THU GỌN
        collapseElement.addEventListener("hide.bs.collapse", function () {
            toggleButton.innerHTML =
                'Xem thêm <i class="fas fa-chevron-down fa-xs"></i>';
            descriptionContainer.classList.remove("expanded");
        });
    }
    const backToTopButton = document.querySelector(".back-to-top");

    if (backToTopButton) {
        // Hiển thị hoặc ẩn nút dựa vào vị trí cuộn
        window.addEventListener("scroll", () => {
            // Hiện nút khi người dùng cuộn xuống hơn 300px
            if (window.scrollY > 300) {
                backToTopButton.style.display = "block";
            } else {
                backToTopButton.style.display = "none";
            }
        });

        // Cuộn mượt lên đầu trang khi nhấp vào nút
        backToTopButton.addEventListener("click", (e) => {
            e.preventDefault(); // Ngăn hành vi mặc định của thẻ <a>
            window.scrollTo({
                top: 0,
                behavior: "smooth", // Tạo hiệu ứng cuộn mượt
            });
        });
    }
});

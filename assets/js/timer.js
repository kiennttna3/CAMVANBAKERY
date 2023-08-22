function updateRealTime() {
    var currentTime = new Date()
    var hours = currentTime.getHours()
    var minutes = currentTime.getMinutes()
    var seconds = currentTime.getSeconds() 
    // Định dạng giờ phút giây để luôn có 2 chữ số
    hours = (hours < 10 ? "0" : "") + hours
    minutes = (minutes < 10 ? "0" : "") + minutes
    seconds = (seconds < 10 ? "0" : "") + seconds  
    var timeString = hours + ":" + minutes + ":" + seconds
    document.getElementById("realTime").textContent = timeString
}
function updateDateTime() {
    var currentDate = new Date()
    var daysOfWeek = ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"]
    // var months = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"]
    var dayOfWeek = daysOfWeek[currentDate.getDay()]
    // var day = currentDate.getDate()
    // var month = months[currentDate.getMonth()]
    // var year = currentDate.getFullYear()
    // var dateString = dayOfWeek + ", " + day + " " + month + " " + year
    var dateString = dayOfWeek
    document.getElementById("dateTime").textContent = dateString
}
// Cập nhật thời gian và ngày tháng mỗi giây
setInterval(function() {
    updateRealTime()
    updateDateTime()
}, 1000)
// Gọi hàm để cập nhật thời gian và ngày tháng lần đầu khi trang được tải
updateRealTime()
updateDateTime()
var count = 0;
document.getElementById("myButton").onclick = function() {
    count++;
    if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
    } else {
        var img = document.createElement("img");
        img.src = "https://sun9-25.userapi.com/impf/c626324/v626324024/1d752/p0TyB6K7svY.jpg?size=320x240&quality=96&sign=19f50f8b66a33dca25bf68745de1d843&c_uniq_tag=wye9QYBeIxNRs_s8HSRTDIgBQM3_UVflQwEipettK1U&type=album";
        document.getElementById("demo").appendChild(img);
    }
}
/**
 * @author michaeldyl520
 * @title 小工具js
 */
$(function () {
    //send
    $('#send').on('click', function () {
        var $btn = $(this).button('loading');
        $btn.button('reset');
    });
    $('#unicodedecode').bind('click', function () {
        $.ajax({
            url: "getUnicodedecodeStr",
            type: "post",
            data: "data=" + $('#str').val(),
            dataType: "html",
            error: function () {
                swal('请求失败！');
            },
            success: function (msg) {
                $('#content').val(msg);
            }
        });
    });
    //搜索
    $('#search').bind('keyup', function () {
        var search = $(this).val();
        $('.list-group a').each(function () {
            if (search != "") {
                var key = $(this).attr('key');
                console.log(search);
                console.log(key.indexOf(search));
                if (key.indexOf(search) >= 0) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            } else {
                $(this).show();
            }

        });
    });
    //ip2long
    $('#ip2long').click(function () {
        $.ajax({
            url: 'getIp2longStr',
            type: 'post',
            data: 'ip=' + $('#ip').val(),
            dataType: '',
            success: function (data) {
                if (data.status == 1)
                    $('#ipString').val(data.content);
                else
                    swal("ip2long转换失败！", "", "error");
            },
            error: function () {
                swal("ip2long转换失败！", "", "error");
            },
            beforeSend: function () {
                $('#ip-string').html('<div style="text-align:center;font-size:14px;color:#ffffff;">加载中，请稍后。。。</div>');
            }
        });
    });
    //long2ip
    $('#long2ip').click(function () {
        $.ajax({
            url: 'getIp',
            type: 'post',
            data: 'ipString=' + $('#ipString').val(),
            dataType: '',
            success: function (data) {
                if (data.status == 1)
                    $('#ip').val(data.content);
                else
                    swal("long2ip转换失败！", "", "error");
            },
            error: function () {
                swal("long2ip转换失败！", "", "error");
            },
            beforeSend: function () {
                $('#ip-string').html('<div style="text-align:center;font-size:14px;color:#ffffff;">加载中，请稍后。。。</div>');
            }
        });
    });
    $('#md5').click(function () {
        $.ajax({
            url: 'index.php/home/Md5/getMd5String',
            data: 'md5String=' + $('#md5-value').val(),
            dataType: 'html',
            success: function (data) {
                $('#md5-return').html(data);
            },
            error: function () {
                alert('失败');
            },
            beforeSend: function () {
                $('#md5-return').html('<div style="text-align:center;font-size:14px;color:#ffffff;">加载中，请稍后。。。</div>');
            }
        });
    });

    $('#toPRC').click(function () {
        var string = $('#timeStampSource').val();
        var prc = toPRC(string);
        $('#timeStampResult').val(prc);
    });

    $('#toTimeStamp').click(function () {
        var nian = $('#nian').val();
        var yue = $('#yue').val();
        var ri = $('#ri').val();
        var shi = $('#shi').val();
        var fen = $('#fen').val();
        var miao = $('#miao').val();
        string = nian + '-' + yue + '-' + ri + ' ' + shi + ':' + fen + ':' + miao;
        var temp = toTimeStamp(string);
        $('#timeResult').val(temp);
    });

    timeStamp = getTimeStamp();
    $('#timeStampSource').val(timeStamp);
});

function getTimeStamp() {
    var timestamp = Date.parse(new Date());
    return timestamp / 1000;
}

function toPRC(string) {
    var temp = format(string);
    return temp;
}
function toTimeStamp(string) {
    var temp = new Date(string);
    return temp.getTime() / 1000;
}
function add0(m) {
    return m < 10 ? '0' + m : m
}
function format(shijianchuo) {
    var time = new Date(shijianchuo * 1000);
    var y = time.getFullYear();
    var m = time.getMonth() + 1;
    var d = time.getDate();
    var h = time.getHours();
    var mm = time.getMinutes();
    var s = time.getSeconds();
    return y + '-' + add0(m) + '-' + add0(d) + ' ' + add0(h) + ':' + add0(mm) + ':' + add0(s);
}
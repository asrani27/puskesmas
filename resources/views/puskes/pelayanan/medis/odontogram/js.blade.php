<script src="/admin/plugins/select2/js/select2.full.min.js"></script>
<script>  
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  
    $("#e2").select2({ dropdownCssClass: "myFont" })
    $("#e3").select2({ dropdownCssClass: "myFont" })
    $("#e4").select2({ dropdownCssClass: "myFont" })

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
  });
</script>
<script src="/admin/js/bootstrap-datepicker.min.js"></script>
<script>
$(document).ready(function(){
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    });
});
</script>
<script>
function newOdontogram(obj,idTabel,position){
    var tipe=obj.data("tipe");
    var changeCode = $("input[name='code']").val();
    var addCode = $("input[name='tambahCode']").val();
    var code = $("#"+idTabel).val();
    if(changeCode=='d'){
        code="wwwww";
    }
    var lastCode = code.substr(code.length-1);
    console.log([addCode, lastCode, changeCode]);
    var arr = code.split('');
    var active = $('#tabel_'+idTabel+' > tbody').find('.'+position+'.active').length;
    
    if(changeCode=='' && addCode==''){
        return false;
    }

    if(changeCode==''){
        changeCode = 'w';
    }
    
    if(arr[4]!='' && arr[4]!='w') {
        if(changeCode!='K')
            if(arr[4]!='K' && changeCode=='w')
                changeCode = arr[4];
    }
    switch(position)
    {
        case 'c':
            arr[0] = changeCode;
            break;
        case 'r':
            arr[1] = changeCode;
            break;
        case 'b':
            arr[2] = changeCode;
            break;
        case 'l':
            arr[3] = changeCode;
            break;
        case 't':
            arr[4] = changeCode;
            break;
        default:
            break;
    }
    
    if(lastCode != addCode){
        code = arr.join('')+addCode;
    } else {
        code = arr.join('');
    }
    if(addCode!=""){
        if(code.length>5){
            code = code.substr(0,5)+addCode;
        }
    }
    
    base_url ="{{ url('/') }}";
    
    dataUrl = base_url+"/odontogram/image/code="+code+"/tipe="+tipe;
    console.log(base_url);
    //console.log([dataUrl, code, addCode, tipe]);
    //var base_url =  json_encode(url('/'))
    //dataUrl = '/odontogram/image/code='+code+'/tipe='+tipe;
    //console.log([base_url]);https://kotabanjarmasin.epuskesmas.id/odontogram/edit/2728?code="+code+"&tipe="+tipe;
    $("#"+idTabel).val(code);
    $('#tabel_'+idTabel).css('background-image','url('+dataUrl+')');
    $('#tabel_'+idTabel).find('.'+position).addClass('active');

}

$(".warna").click(function(){
    $('button[data-notify=dismiss]').click();
    $(".warna[name!='"+$(this).attr("name")+"']").css("background-color","");
    $(".gambar[name!='"+$(this).attr("name")+"']").css("background-color","");
    $(this).css("background-color","red");
    if($(this).css("background-color","red")){}
    callAlert($(this).data("keterangan"),$(this).val());
    
    $("input[name='tambahCode']").val("");
    $("input[name='code']").val($(this).data("id"));
    toOdontogram();
});

$(".gambar").click(function(){
    $('button[data-notify=dismiss]').click();
    $(".warna[name!='"+$(this).attr("name")+"']").css("background-color","");
    $(".gambar[name!='"+$(this).attr("name")+"']").css("background-color","");
    $(this).css("background-color","red");
    callAlert($(this).data("keterangan"),$(this).val());

    $("input[name='code']").val("");
    $("input[name='tambahCode']").val($(this).data("id"));
    toOdontogram();
});

$('#back_to_choose').click(function(){
    var offset = $('#keadaan_gigi').offset();
    offset.left -= 20;
    offset.top -= 20;
    $('html, body').animate({
        scrollTop: offset.top,
        scrollLeft: offset.left
    });
});

function toOdontogram(){
    var offset = $('#image_odontogram').offset();
    //offset.left -= 20;
    //offset.top -= 120;
    $('html, body').animate({
        //scrollTop: offset.top,
        //scrollLeft: offset.left
    });
}
function callAlert(keterangan, kode){
    alert('Silahkan klik/tap pada odontogram untuk menandai status '+keterangan+' ('+kode+').','info', false);
    $(this).dblclick(function(event){
        $('button[data-notify=dismiss]').click();
    });
}

$("input[name='cari_pelayanan']").autocomplete({
    source: function( request, response ) {
        $.ajax({
            url: "https://kotabanjarmasin.epuskesmas.id/odontogram/edit/2728",
            method: "GET",
            dataType: "json",
            data: {
                autocomplete: 'pelayanan',
                search: {'cari_pelayanan':request.term}
            },
            success: function(data) {
                response(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    },
    focus: function(event,ui){
        $(this).parent().removeClass('has-success').addClass('has-error');
        return false;
    },
    select: function(event,ui){
        $(this).parent().removeClass('has-error').addClass('has-success');
        $('input[name="Odontogram[pelayanan_id]"]').val(ui.item.id);
        setDataPelayanan(ui.item);
        setRiwayatPasien();
    },
    minLength: 1
});


$("input[name='dokter_nama']").autocomplete({
    source: function( request, response ) {
        $.ajax({
            url: "https://kotabanjarmasin.epuskesmas.id/odontogram/edit/2728",
            method: "GET",
            dataType: "json",
            data: {
                autocomplete: 'dokter',
                search: {'dokter_nama':request.term}
            },
            success: function(data) {
                response(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    },
    focus: function(event,ui){
        $(this).parent().removeClass('has-success').addClass('has-error');
        return false;
    },
    select: function(event,ui){
        $(this).parent().removeClass('has-error').addClass('has-success');
        $('input[name="Odontogram[dokter_id]"]').val(ui.item.id);
    },
    minLength: 1
});

$("input[name='perawat_nama']").autocomplete({
    source: function( request, response ) {
        $.ajax({
            url: "https://kotabanjarmasin.epuskesmas.id/odontogram/edit/2728",
            method: "GET",
            dataType: "json",
            data: {
                autocomplete: 'perawat',
                search: {'perawat_nama':request.term}
            },
            success: function(data) {
                response(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    },
    focus: function(event,ui){
        $(this).parent().removeClass('has-success').addClass('has-error');
        return false;
    },
    select: function(event,ui){
        $(this).parent().removeClass('has-error').addClass('has-success');
        $('input[name="Odontogram[perawat_id]"]').val(ui.item.id);
    },
    minLength: 1
});

function setRiwayatPasien(){
    $.ajax({
            url: "https://kotabanjarmasin.epuskesmas.id/odontogram/edit/2728",
            method: "GET",
            dataType: "json",
            data: {
                riwayatpasien: $('#no_rm_lama').val()
            },
            success: function(data) {
                $('#modalOdontogram').modal('show');
                $('#modalOdontogram #riwayatOdontogram').html(data['view']);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
}

</script>
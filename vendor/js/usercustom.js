$(document).ready(function () {

    // $("#suratmasuk").DataTable();
    $('#suratmasuk').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true
    })

    $('#lapsuratmasuk').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
    })

    $('#cetaksuratmasuk').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": true
    })

    $('#tabeldisposisi').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true
    })
    // $("#suratkeluar").DataTable();
    $('#suratkeluar').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    })

    $('#lapsuratkeluar').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
    })

    $('#cetaksuratkeluar').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": true
    })

    // SURATMASUK
    $('#filter-index-sm').change(function () {
        var id_indeks = $('#filter-index-sm option:selected').val();
        $.ajax({
            url: 'http://localhost/e-arsip-ci/ajax/indekssm',
            type: 'POST',
            data: {
                'id_indeks': id_indeks
            },
            success: function (data) {
                $('#lapsuratmasuk').html(data);
            }
        })
    })

    $('#ubahsm').on('show.bs.modal', function (e) {
        var id_suratmasuk = $(e.relatedTarget).data('id-suratmasuk');

        $.ajax({
            url: 'http://localhost/e-arsip-ci/ajax/ajaxubahsm',
            method: 'POST',
            data: 'id_suratmasuk=' + id_suratmasuk,
            success: function (data) {
                $('#dataubahsm').html(data);
            }
        })
    })

    $('#hapussm').on('show.bs.modal', function (e) {
        var id_suratmasuk = $(e.relatedTarget).data('id-suratmasuk');
        var no_suratmasuk = $(e.relatedTarget).data('no-suratmasuk');

        $('#hps-id-suratmasuk').attr('href', 'https://localhost/e-arsip-ci/admin/hapussm/' + id_suratmasuk);
        $('#hps-no-suratmasuk').text(no_suratmasuk);
    })

    // DISPOSISI
    $('#pengisi').change(function (event) {
        var pengisi = $('#pengisi option:selected').val();
        var id_suratmasuk = $('#id_sm').val();
        $.ajax({
            url: 'http://localhost/e-arsip-ci/ajax/ajaxcekpengisidisp',
            type: 'POST',
            data: {
                'pengisi': pengisi, 'id_suratmasuk': id_suratmasuk
            },
            success: function (data) {
                console.log('ok');
                $('#alertpengisi').text(data);
            }
        })
    })

    $('#editdisp').on('show.bs.modal', function(e){
        var id_disposisi = $(e.relatedTarget).data('id_disposisi');

        $.ajax({
            url: 'http://localhost/e-arsip-ci/ajax/ajaxeditdisp/'+id_disposisi,
            type: 'POST',
            success: function(data){
                $("#ajaxeditdisp").html(data);
            }
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    })

    $('#hapusdisp').on('show.bs.modal', function(e){
        var id_disposisi = $(e.relatedTarget).data('id_disposisi');

        $.ajax({
            url: 'http://localhost/e-arsip-ci/admin/hapusdisp/'+id_disposisi,
            type: 'POST',
            success: function(data){
                $('#hps-id-disposisi').attr('href', 'http://localhost/e-arsip-ci/admin/hapusdisp/'+id_disposisi);
            }
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    })

    $('#cetakdisp').on('show.bs.modal', function(e){
        var id_disposisi = $(e.relatedTarget).data('id_disposisi');

        $.ajax({
            url: 'http://localhost/e-arsip-ci/ajax/ajaxcetakdisp/'+id_disposisi,
            type: 'POST',
            success: function(data){
                document.getElementById('modalcetakdisp').innerHTML = data;
            }
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    })

    $('#btncetakdisp').click(function(event) {
        $('#modalcetakdisp').print();
    })

    $('#cetaklaporansm').click(function () {
        $('#lapsuratmasuk').print();
    })

    // SURAT KELUAR

    $('#filter-index-sk').change(function () {
        var id_indeks = $('#filter-index-sk option:selected').val();
        $.ajax({
            url: 'http://localhost/e-arsip-ci/ajax/indekssk',
            type: 'POST',
            data: {
                'id_indeks': id_indeks
            },
            success: function (data) {
                $('#lapsuratkeluar').html(data);
            }
        })
    })

    $('#cetaklaporansk').click(function () {
        $('#lapsuratkeluar').print();
    })

    $('#ubahsk').on('show.bs.modal', function (e) {
        var id_suratkeluar = $(e.relatedTarget).data('id-sk');

        $.ajax({
            url: 'http://localhost/e-arsip-ci/ajax/ajaxubahsk',
            method: 'POST',
            data: 'id_suratkeluar=' + id_suratkeluar,
            success: function (data) {
                $('#dataubahsk').html(data);
            }
        })
    })

    $('#hapussk').on('show.bs.modal', function (e) {
        var id_suratkeluar = $(e.relatedTarget).data('id-sk');
        var no_suratkeluar = $(e.relatedTarget).data('no-suratkeluar');

        $('#hps-id-suratkeluar').attr('href', 'https://localhost/e-arsip-ci/admin/hapussk/' + id_suratkeluar);
        $('#hps-no-suratkeluar').text(no_suratkeluar);
    })


    // INDEKS

    $('#ubahindeks').on('show.bs.modal', function (e) {
        var id_indeks = $(e.relatedTarget).data('id-indeks');

        $.ajax({
            url: 'http://localhost/e-arsip-ci/ajax/ajaxubahindeks',
            type: 'POST',
            data: {
                'id_indeks': id_indeks
            },
            success: function (data) {
                $('#dataubahindeks').html(data);
            }
        })
    })

    $('#hapusindeks').on('show.bs.modal', function (e) {
        var id_indeks = $(e.relatedTarget).data('id-indeks');
        var judul_indeks = $(e.relatedTarget).data('judul-indeks');

        $('#hps-id-indeks').attr('href', 'https://localhost/e-arsip-ci/admin/hapusindeks/' + id_indeks);
        $('#hps-judul-indeks').text(judul_indeks);
    })

    // USERS

    $('#password2').keyup(function () {
        var password = $('#password').val();
        var password2 = $('#password2').val();

        if (password != password2) {
            $('#passwordvalidasi').text('Password dan konfirmasi tidak sesuai');
            $('.tambahuser').attr('disabled', true);
        } else {
            $('#passwordvalidasi').text('');
            $('.tambahuser').removeAttr('disabled');
        }
    })

    $('#hapususer').on('show.bs.modal', function (e) {
        var id_user = $(e.relatedTarget).data('id-user');
        var nama_lengkap = $(e.relatedTarget).data('nama-lengkap');

        $('#hps-nama-lengkap').text(nama_lengkap);
        $('#hps-id-user').attr('href', 'http://localhost/e-arsip-ci/admin/hapususer/' + id_user);

    })

    $('#editprofil').on('show.bs.modal', function (e) {
        var id_user = $(e.relatedTarget).data('id_user');

        $.ajax({
            url: 'http://localhost/e-arsip-ci/ajax/ajaxeditprofil',
            type: 'POST',
            data: {
                'id_user': id_user
            },
            success: function (data) {
                $('#dataprofil').html(data);
            }
        })
    })

    $('#gantipassword').on('show.bs.modal', function (e) {
        var id_user = $(e.relatedTarget).data('id_user');

        $('#password_baru2').keyup(function () {
            var password_baru2 = $('#password_baru2').val();
            var password_baru = $('#password_baru').val();

            if (password_baru != password_baru2) {
                $('#password_baru_message').text('Password dan konfirmasi tidak sesuai!');
                $('.btnubahpassword').show();
                $('#btnubahpassword').hide();
            } else {
                $('#password_baru_message').text('');
                $('.btnubahpassword').hide();
                $('#btnubahpassword').show();
            }
        })
    })
})
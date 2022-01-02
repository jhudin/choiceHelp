
$(document).ready(function() {
    /*Mostrar ocultar menu principal*/
    $('.btn-menu').on('click', function() {
        var navLateral = $('.navLateral');
        var pageContent = $('.pageContent');
        var navOption = $('.navBar-options');
        if (navLateral.hasClass('navLateral-change') && pageContent.hasClass('pageContent-change')) {
            navLateral.removeClass('navLateral-change');
            pageContent.removeClass('pageContent-change');
            navOption.removeClass('navBar-options-change');
        } else {
            navLateral.addClass('navLateral-change');
            pageContent.addClass('pageContent-change');
            navOption.addClass('navBar-options-change');
        }
    });
    /*Salir del sistema*/
    $('.btn-exit').on('click', function() {
        swal({
                title: '¿Quieres salir del sistema?',
                text: "La sesión actual se cerrará y saldrá del sistema.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, salir',
                closeOnConfirm: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location = 'cerrar_s.php';
                }
            });
    });

    /*Ingresar al sistema*/
    $('.btn-login').on('click', function() {
        window.location = 'login.php';
    });

    /*Editar tabla*/

    function showPopup(){
        $('.pop-up').addClass('show');
        $('.pop-up-wrap').addClass('show');
    }

    $("#close").click(function(){
        $('.pop-up').removeClass('show');
        $('.pop-up-wrap').removeClass('show');
    });

    $(".btn-abrir").click(showPopup);

    /*sub menu*/

    $('.btn-subMenu').on('click', function() {
        var subMenu = $(this).next('ul');
        var icon = $(this).children("span");
        if (subMenu.hasClass('sub-menu-options-show')) {
            subMenu.removeClass('sub-menu-options-show');
            icon.addClass('zmdi-chevron-left').removeClass('zmdi-chevron-down');
        } else {
            subMenu.addClass('sub-menu-options-show');
            icon.addClass('zmdi-chevron-down').removeClass('zmdi-chevron-left');
        }
    });
    
    $('table').DataTable({   
    select: true,
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        dom: 'Bftp',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      '<i class="fas fa-file-excel"></i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf"></i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			},
		]	        
    });     

});
(function($) {
    $(window).load(function() {
        $(".navLateral-body, .pageContent").mCustomScrollbar({
            theme: "minimal-dark",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons: { enable: true }
        });
    });
})(jQuery);
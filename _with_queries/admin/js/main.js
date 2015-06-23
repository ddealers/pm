var isShowBreak = false;
var isShowHeroes = false;
var isShowNadie = false;
var isShowKaraoke = false;
var isShowRisa = false;
var isShowParanoia = false;
var isShowPuedes = false;
var isShowTuf = false;
var isShowTurno = false;
var isShowVas = false;
var isShowRuda = false;

$(".actions #moderar").on('click',moderar);
$(".actions #eliminar").on('click',eliminar);
$("#tab_encuesta .nav-tabs li").on("shown.bs.tab",function(){
    var tab = $(this).data("tab");
    tab = 'show' + tab;
    if (tab != 'showCuenta') {
        self[tab]();
    }
});
$("#typeprogram").on("change",showTableEncuesta);
function moderar(){
    var c = $(this).data("comment");
    var comment = $("#text-" + c).val();

    $.ajax({
        url: "scripts/actions.php",
        type: "post",
        dataType: "json",
        data: {
            request: "saveComment",
            data: c,
            comment: comment
        },
        success: function(response) {
            //console.log(response);
            if (response.success && response.data) {
                alert("Comentario moderado correctamente");
            } else {
                alert("No se pudo moderar el comentario");
            }
        },
        error: function() {
            alert("Hubo un error, intenta mas tarde.");
        }
    });
}

function eliminar(){
    var c = $(this).data("comment");

    $.ajax({
        url: "scripts/actions.php",
        type: "post",
        dataType: "json",
        data: {
            request: "deleteComment",
            data: c
        },
        success: function(response) {
            //console.log(response);
            if (response.success && response.data) {
                alert("Comentario eliminado correctamente");
            } else {
                alert("No se pudo eliminar el comentario");
            }
        },
        error: function() {
            alert("Hubo un error, intenta mas tarde.");
        }
    });
}

function showBreak(){
    if (!isShowBreak) {
        isShowBreak = true;
        /*Graficas del break*/
        jQuery.jqplot ('chart_break_conductor', [chart.programs['El break'].conductor],
            { 
                seriesDefaults: {
                    renderer: jQuery.jqplot.PieRenderer, 
                    rendererOptions: {
                      showDataLabels: true,
                      diameter: 100
                    }
                }, 
                legend: { show:true, location: 'n' },
                title: {
                    text: 'Conductor',
                    show: true,
                }
            }
        );
        jQuery.jqplot ('chart_break_invitados', [chart.programs['El break'].invitados],
            { 
                seriesDefaults: {
                    renderer: jQuery.jqplot.PieRenderer, 
                    rendererOptions: {
                      showDataLabels: true,
                      diameter: 100
                    }
                }, 
                legend: { show:true, location: 'n' },
                title: {
                    text: 'Invitados',
                    show: true,
                }
            }
        );
        jQuery.jqplot ('chart_break_dinamicas', [chart.programs['El break'].dinamicas],
            { 
                seriesDefaults: {
                    renderer: jQuery.jqplot.PieRenderer, 
                    rendererOptions: {
                      showDataLabels: true,
                      diameter: 100
                    }
                }, 
                legend: { show:true, location: 'n' },
                title: {
                    text: 'Dinamicas',
                    show: true,
                }
            }
        );
        jQuery.jqplot ('chart_break_look', [chart.programs['El break'].look],
            { 
                seriesDefaults: {
                    renderer: jQuery.jqplot.PieRenderer, 
                    rendererOptions: {
                      showDataLabels: true,
                      diameter: 100
                    }
                }, 
                legend: { show:true, location: 'n' },
                title: {
                    text: 'Look',
                    show: true,
                }
            }
        );
        jQuery.jqplot ('chart_break_contenido', [chart.programs['El break'].contenido],
            { 
                seriesDefaults: {
                    renderer: jQuery.jqplot.PieRenderer, 
                    rendererOptions: {
                      showDataLabels: true,
                      diameter: 100
                    }
                }, 
                legend: { show:true, location: 'n' },
                title: {
                    text: 'Contenido',
                    show: true,
                }
            }
        );
    }
}

function showHeroes(){
    if (!isShowHeroes) {
        isShowHeroes = true;
        /*Héroes del norte*/
        jQuery.jqplot ('chart_heroes_elenco', [chart.series['Héroes del norte'].elenco],
            { 
                seriesDefaults: {
                    renderer: jQuery.jqplot.PieRenderer, 
                    rendererOptions: {
                      showDataLabels: true,
                      diameter: 100
                    }
                }, 
                legend: { show:true, location: 'n' },
                title: {
                    text: 'Elenco',
                    show: true,
                }
            }
        );
        jQuery.jqplot ('chart_heroes_historia', [chart.series['Héroes del norte'].historia],
            { 
                seriesDefaults: {
                    renderer: jQuery.jqplot.PieRenderer, 
                    rendererOptions: {
                      showDataLabels: true,
                      diameter: 100
                    }
                }, 
                legend: { show:true, location: 'n' },
                title: {
                    text: 'Historia',
                    show: true,
                }
            }
        );
        jQuery.jqplot ('chart_heroes_look', [chart.series['Héroes del norte'].look],
            { 
                seriesDefaults: {
                    renderer: jQuery.jqplot.PieRenderer, 
                    rendererOptions: {
                      showDataLabels: true,
                      diameter: 100
                    }
                }, 
                legend: { show:true, location: 'n' },
                title: {
                    text: 'Look',
                    show: true,
                }
            }
        );
    }
}

function showNadie(){
    if (!isShowNadie) {
        isShowNadie = true;
        /*Hoy soy nadie*/
        setTimeout(function(){
            jQuery.jqplot ('chart_nadie_elenco', [chart.series['Hoy soy nadie'].elenco],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Elenco',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_nadie_historia', [chart.series['Hoy soy nadie'].historia],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Historia',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_nadie_look', [chart.series['Hoy soy nadie'].look],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Look',
                        show: true,
                    }
                }
            );
        },100);
    }
}

function showKaraoke(){
    if (!isShowKaraoke) {
        isShowKaraoke = true;
        /*Graficas del karaoke*/
        setTimeout(function(){
            jQuery.jqplot ('chart_karaoke_conductor', [chart.programs['Karaoke, canta y no te rajes'].conductor],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Conductor',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_karaoke_invitados', [chart.programs['Karaoke, canta y no te rajes'].invitados],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Invitados',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_karaoke_dinamicas', [chart.programs['Karaoke, canta y no te rajes'].dinamicas],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Dinamicas',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_karaoke_look', [chart.programs['Karaoke, canta y no te rajes'].look],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Look',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_karaoke_contenido', [chart.programs['Karaoke, canta y no te rajes'].contenido],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Contenido',
                        show: true,
                    }
                }
            );
        },100);
    }
}


function showRisa(){
    if (!isShowRisa) {
        isShowRisa = true;
        /*Graficas de me caigo de risa*/
        setTimeout(function(){
            jQuery.jqplot ('chart_caigo_conductor', [chart.programs['Me caigo de risa'].conductor],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Conductor',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_caigo_invitados', [chart.programs['Me caigo de risa'].invitados],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Invitados',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_caigo_dinamicas', [chart.programs['Me caigo de risa'].dinamicas],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Dinamicas',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_caigo_look', [chart.programs['Me caigo de risa'].look],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Look',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_caigo_contenido', [chart.programs['Me caigo de risa'].contenido],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Contenido',
                        show: true,
                    }
                }
            );
        },100);
    }
}

function showParanoia(){
    if (!isShowParanoia) {
        isShowParanoia = true;
        /*Graficas de paranoia*/
        setTimeout(function(){
            jQuery.jqplot ('chart_paranoia_conductor', [chart.programs['Paranoia total'].conductor],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Conductor',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_paranoia_invitados', [chart.programs['Paranoia total'].invitados],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Invitados',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_paranoia_dinamicas', [chart.programs['Paranoia total'].dinamicas],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Dinamicas',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_paranoia_look', [chart.programs['Paranoia total'].look],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Look',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_paranoia_contenido', [chart.programs['Paranoia total'].contenido],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Contenido',
                        show: true,
                    }
                }
            );
        },100);
    }
}

function showPuedes(){
    if (!isShowPuedes) {
        isShowPuedes = true;
        /*Graficas de puedes con 100*/
        setTimeout(function(){
            jQuery.jqplot ('chart_puedes_conductor', [chart.programs['Puedes con 100'].conductor],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Conductor',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_puedes_invitados', [chart.programs['Puedes con 100'].invitados],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Invitados',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_puedes_dinamicas', [chart.programs['Puedes con 100'].dinamicas],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Dinamicas',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_puedes_look', [chart.programs['Puedes con 100'].look],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Look',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_puedes_contenido', [chart.programs['Puedes con 100'].contenido],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Contenido',
                        show: true,
                    }
                }
            );
        },100);
    }
}

function showTuf(){
    if (!isShowTuf) {
        isShowTuf = true;
        /*Graficas de TuF*/
        setTimeout(function(){
            jQuery.jqplot ('chart_tuf_conductor', [chart.programs['The ultimate fighter latinoamérica'].conductor],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Conductor',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_tuf_invitados', [chart.programs['The ultimate fighter latinoamérica'].invitados],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Invitados',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_tuf_dinamicas', [chart.programs['The ultimate fighter latinoamérica'].dinamicas],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Dinamicas',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_tuf_look', [chart.programs['The ultimate fighter latinoamérica'].look],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Look',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_tuf_contenido', [chart.programs['The ultimate fighter latinoamérica'].contenido],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Contenido',
                        show: true,
                    }
                }
            );
        },100);
    }
}

function showTurno(){
    if (!isShowTurno) {
        isShowTurno = true;
        /*Graficas de Turnocturno*/
        setTimeout(function(){
            jQuery.jqplot ('chart_turno_conductor', [chart.programs['Turnocturno'].conductor],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Conductor',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_turno_invitados', [chart.programs['Turnocturno'].invitados],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Invitados',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_turno_dinamicas', [chart.programs['Turnocturno'].dinamicas],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Dinamicas',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_turno_look', [chart.programs['Turnocturno'].look],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Look',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_turno_contenido', [chart.programs['Turnocturno'].contenido],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Contenido',
                        show: true,
                    }
                }
            );
        },100);
    }
}

function showVas(){
    if (!isShowVas) {
        isShowVas = true;
        /*Graficas de vas con todo*/
        setTimeout(function(){
            jQuery.jqplot ('chart_vas_conductor', [chart.programs['Vas con todo'].conductor],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Conductor',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_vas_invitados', [chart.programs['Vas con todo'].invitados],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Invitados',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_vas_dinamicas', [chart.programs['Vas con todo'].dinamicas],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Dinamicas',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_vas_look', [chart.programs['Vas con todo'].look],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Look',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_vas_contenido', [chart.programs['Vas con todo'].contenido],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Contenido',
                        show: true,
                    }
                }
            );
        },100);
    }
}

function showRuda(){
    if (!isShowRuda) {
        isShowRuda = true;
        /*Graficas de vas con todo*/
        setTimeout(function(){
            jQuery.jqplot ('chart_ruda_conductor', [chart.programs['Zona ruda'].conductor],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Conductor',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_ruda_invitados', [chart.programs['Zona ruda'].invitados],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Invitados',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_ruda_dinamicas', [chart.programs['Zona ruda'].dinamicas],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Dinamicas',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_ruda_look', [chart.programs['Zona ruda'].look],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Look',
                        show: true,
                    }
                }
            );
            jQuery.jqplot ('chart_ruda_contenido', [chart.programs['Zona ruda'].contenido],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 100
                        }
                    }, 
                    legend: { show:true, location: 'n' },
                    title: {
                        text: 'Contenido',
                        show: true,
                    }
                }
            );
        },100);
    }
}

function showTableEncuesta() {
    var val = $(this).val();
    window.location = "/admin/site/encuestapm.php?program=" + encodeURIComponent(val) + "&&section=list";
}



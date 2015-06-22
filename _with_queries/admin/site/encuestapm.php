<?php
    require_once('header.php');

    $getProgram = isset($_GET['program'])?trim($_GET['program']):'';
    $getSection = isset($_GET['section'])?trim($_GET['section']):'';
    $chart = $PM->getDataEncuestaPM();
    $dataEncuesta = $PM->getDataEncuestaPMFull($getProgram);
    $programsT = array();
    $totalVotos = 0;

    foreach ($chart['total'] as $program) {
        $programsT[$program['program']] = $program['total'];
        $totalVotos += $program['total'];
    }
?>
    <link rel="stylesheet" type="text/css" hrf="../css/jquery.jqplot.min.css" />
    
    <div class="col-lg-12">
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#graficas" aria-controls="graficas" role="tab" data-toggle="tab">Gráficas</a></li>
                <li id="tabTabla" role="presentation"><a href="#tabla" aria-controls="tabla" role="tab" data-toggle="tab">Tabla</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="graficas">
                    <div>
                        <h3>Total de calificaciones: (<?php echo $totalVotos; ?>)</h3>
                        <div id="chart_programs" style="width: 100%; height: 500px;" ></div>
                    </div>
                    <div id="tab_encuesta" role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li data-tab="Cuenta" role="presentation" class="active"><a href="#cuenta" aria-controls="cuenta" role="tab" data-toggle="tab">Cuenta Pendiente</a></li>
                            <li data-tab="Break" role="presentation"><a href="#break" aria-controls="break" role="tab" data-toggle="tab">El break</a></li>
                            <li data-tab="Heroes" role="presentation"><a href="#heroes" aria-controls="heroes" role="tab" data-toggle="tab">Héroes del norte</a></li>
                            <li data-tab="Nadie" role="presentation"><a href="#nadie" aria-controls="nadie" onclick="showNadie();" role="tab" data-toggle="tab">Hoy soy nadie</a></li>
                            <li data-tab="Karaoke" role="presentation"><a href="#karaoke" aria-controls="karaoke" onclick="showKaraoke();" role="tab" data-toggle="tab">Karaoke, canta y no te rajes</a></li>
                            <li data-tab="Risa" role="presentation"><a href="#risa" aria-controls="risa" role="tab" onclick="showRisa();" data-toggle="tab">Me caigo de risa</a></li>
                            <li data-tab="Paranoia" role="presentation"><a href="#paranoia" aria-controls="paranoia" onclick="showParanoia();" role="tab" data-toggle="tab">Paranoia total</a></li>
                            <li data-tab="Puedes" role="presentation"><a href="#puedes" aria-controls="puedes" onclick="showPuedes();" role="tab" data-toggle="tab">Puedes con 100</a></li>
                            <li data-tab="Tuf" role="presentation"><a href="#tuf" aria-controls="tuf" role="tab" onclick="showTuf();" data-toggle="tab">The ultimate fighter latinoamérica</a></li>
                            <li data-tab="Turno" role="presentation"><a href="#turno" aria-controls="turno" role="tab" onclick="showTurno();" data-toggle="tab">Turnocturno</a></li>
                            <li data-tab="Vas" role="presentation"><a href="#vas" aria-controls="vas" role="tab" onclick="showVas();" data-toggle="tab">Vas con todo</a></li>
                            <li data-tab="Ruda" role="presentation"><a href="#ruda" aria-controls="ruda" role="tab" onclick="showRuda();" data-toggle="tab">Zona ruda</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="cuenta">
                                <h3>Cuenta Pendiente (<?php echo $programsT['Cuenta pendiente']; ?>)</h3>
                                <div id="chart_cuenta_elenco" class="sub_chart"></div>
                                <div id="chart_cuenta_historia" class="sub_chart"></div>
                                <div id="chart_cuenta_look" class="sub_chart"></div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="break">
                                <h3>El break (<?php echo $programsT['El break']; ?>)</h3>
                                <div id="chart_break_conductor" class="sub_chart"></div>
                                <div id="chart_break_invitados" class="sub_chart"></div>
                                <div id="chart_break_dinamicas" class="sub_chart"></div>
                                <div id="chart_break_look" class="sub_chart"></div>
                                <div id="chart_break_contenido" class="sub_chart"></div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="heroes">
                                <h3>Héroes del norte (<?php echo $programsT['Héroes del norte']; ?>)</h3>
                                <div id="chart_heroes_elenco" class="sub_chart"></div>
                                <div id="chart_heroes_historia" class="sub_chart"></div>
                                <div id="chart_heroes_look" class="sub_chart"></div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="nadie">
                                <h3>Hoy soy nadie (<?php echo $programsT['Hoy soy nadie']; ?>)</h3>
                                <div id="chart_nadie_elenco" class="sub_chart"></div>
                                <div id="chart_nadie_historia" class="sub_chart"></div>
                                <div id="chart_nadie_look" class="sub_chart"></div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="karaoke">
                                <h3>Karaoke, canta y no te rajes (<?php echo $programsT['Karaoke, canta y no te rajes']; ?>)</h3>
                                <div id="chart_karaoke_conductor" class="sub_chart"></div>
                                <div id="chart_karaoke_invitados" class="sub_chart"></div>
                                <div id="chart_karaoke_dinamicas" class="sub_chart"></div>
                                <div id="chart_karaoke_look" class="sub_chart"></div>
                                <div id="chart_karaoke_contenido" class="sub_chart"></div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="risa">
                                <h3>Me caigo de risa (<?php echo $programsT['Me caigo de risa']; ?>)</h3>
                                <div id="chart_caigo_conductor" class="sub_chart"></div>
                                <div id="chart_caigo_invitados" class="sub_chart"></div>
                                <div id="chart_caigo_dinamicas" class="sub_chart"></div>
                                <div id="chart_caigo_look" class="sub_chart"></div>
                                <div id="chart_caigo_contenido" class="sub_chart"></div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="paranoia">
                                <h3>Paranoia total (<?php echo $programsT['Paranoia total']; ?>)</h3>
                                <div id="chart_paranoia_conductor" class="sub_chart"></div>
                                <div id="chart_paranoia_invitados" class="sub_chart"></div>
                                <div id="chart_paranoia_dinamicas" class="sub_chart"></div>
                                <div id="chart_paranoia_look" class="sub_chart"></div>
                                <div id="chart_paranoia_contenido" class="sub_chart"></div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="puedes">
                                <h3>Puedes con 100 (<?php echo $programsT['Puedes con 100']; ?>)</h3>
                                <div id="chart_puedes_conductor" class="sub_chart"></div>
                                <div id="chart_puedes_invitados" class="sub_chart"></div>
                                <div id="chart_puedes_dinamicas" class="sub_chart"></div>
                                <div id="chart_puedes_look" class="sub_chart"></div>
                                <div id="chart_puedes_contenido" class="sub_chart"></div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tuf">
                                <h3>The ultimate fighter Latinoamérica (<?php echo $programsT['The ultimate fighter latinoamérica']; ?>)</h3>
                                <div id="chart_tuf_conductor" class="sub_chart"></div>
                                <div id="chart_tuf_invitados" class="sub_chart"></div>
                                <div id="chart_tuf_dinamicas" class="sub_chart"></div>
                                <div id="chart_tuf_look" class="sub_chart"></div>
                                <div id="chart_tuf_contenido" class="sub_chart"></div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="turno">
                                <h3>Turnocturno (<?php echo $programsT['Turnocturno']; ?>)</h3>
                                <div id="chart_turno_conductor" class="sub_chart"></div>
                                <div id="chart_turno_invitados" class="sub_chart"></div>
                                <div id="chart_turno_dinamicas" class="sub_chart"></div>
                                <div id="chart_turno_look" class="sub_chart"></div>
                                <div id="chart_turno_contenido" class="sub_chart"></div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="vas">
                                <h3>Vas con todo (<?php echo $programsT['Vas con todo']; ?>)</h3>
                                <div id="chart_vas_conductor" class="sub_chart"></div>
                                <div id="chart_vas_invitados" class="sub_chart"></div>
                                <div id="chart_vas_dinamicas" class="sub_chart"></div>
                                <div id="chart_vas_look" class="sub_chart"></div>
                                <div id="chart_vas_contenido" class="sub_chart"></div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="ruda">
                                <h3>Zona ruda (<?php echo $programsT['Zona ruda']; ?>)</h3>
                                <div id="chart_ruda_conductor" class="sub_chart"></div>
                                <div id="chart_ruda_invitados" class="sub_chart"></div>
                                <div id="chart_ruda_dinamicas" class="sub_chart"></div>
                                <div id="chart_ruda_look" class="sub_chart"></div>
                                <div id="chart_ruda_contenido" class="sub_chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="tabla">
                    <div class="table-responsive">
                        <div>
                            <label for="typeprogram">Programa: </label>
                            <select name="typeprogram" id="typeprogram">
                                <option value="<?php echo $chart['total'][0]['program']; ?>"><?php echo $chart['total'][0]['program']; ?></option>
                                <option value="<?php echo $chart['total'][1]['program']; ?>"><?php echo $chart['total'][1]['program']; ?></option>
                                <option value="<?php echo $chart['total'][2]['program']; ?>"><?php echo $chart['total'][2]['program']; ?></option>
                                <option value="<?php echo $chart['total'][3]['program']; ?>"><?php echo $chart['total'][3]['program']; ?></option>
                                <option value="<?php echo $chart['total'][4]['program']; ?>"><?php echo $chart['total'][4]['program']; ?></option>
                                <option value="<?php echo $chart['total'][5]['program']; ?>"><?php echo $chart['total'][5]['program']; ?></option>
                                <option value="<?php echo $chart['total'][6]['program']; ?>"><?php echo $chart['total'][6]['program']; ?></option>
                                <option value="<?php echo $chart['total'][7]['program']; ?>"><?php echo $chart['total'][7]['program']; ?></option>
                                <option value="<?php echo $chart['total'][8]['program']; ?>"><?php echo $chart['total'][8]['program']; ?></option>
                                <option value="<?php echo $chart['total'][9]['program']; ?>"><?php echo $chart['total'][9]['program']; ?></option>
                                <option value="<?php echo $chart['total'][10]['program']; ?>"><?php echo $chart['total'][10]['program']; ?></option>
                                <option value="<?php echo $chart['total'][11]['program']; ?>"><?php echo $chart['total'][11]['program']; ?></option>
                            </select>
                        </div>
                        <table id="table-encuesta" class="table table-bordered table-hover table-striped tablesorter">
                            <thead>
                            <tr>
                                <th>Programa <i class="fa fa-sort"></i></th>
                                <th>Conductor <i class="fa fa-sort"></i></th>
                                <th>Invitados <i class="fa fa-sort"></i></th>
                                <th>Dinámicas <i class="fa fa-sort"></i></th>
                                <th>Contenido <i class="fa fa-sort"></i></th>
                                <th>Look <i class="fa fa-sort"></i></th>
                                <th>Elenco <i class="fa fa-sort"></i></th>
                                <th>Historia <i class="fa fa-sort"></i></th>
                                <th>Comentario <i class="fa fa-sort"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($dataEncuesta as $data) { ?>
                                <tr>
                                    <td><?php echo $data['program']; ?></td>
                                    <td><?php echo $data['conductor']; ?></td>
                                    <td><?php echo $data['invitados']; ?></td>
                                    <td><?php echo $data['dinamicas']; ?></td>
                                    <td><?php echo $data['contenido']; ?></td>
                                    <td><?php echo $data['look']; ?></td>
                                    <td><?php echo $data['elenco']; ?></td>
                                    <td><?php echo $data['historia']; ?></td>
                                    <td><?php echo $data['opinion']; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="../js/jqplot.pieRenderer.min.js"></script>
    <script type="text/javascript">
        var chart = <?php echo json_encode($chart); ?>;
        var dataPrograms = [];
        var getsection = "<?php echo $getSection; ?>";

        for (var i = 0; i < chart.total.length; i++) {
            var value = parseInt(chart.total[i].total);
            dataPrograms[i] = [chart.total[i].program,value];
        };

        $(document).ready(function(){
            var total = jQuery.jqplot ('chart_programs', [dataPrograms],
                { 
                    seriesDefaults: {
                        renderer: jQuery.jqplot.PieRenderer, 
                        rendererOptions: {
                          showDataLabels: true,
                          diameter: 350
                        }
                    }, 
                    legend: { show:true, location: 'e' }
                }
            );

            //Cuenta pendiente
            var chart_cuenta_elenco = jQuery.jqplot ('chart_cuenta_elenco', [chart.series['Cuenta pendiente'].elenco],
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
            var chart_cuenta_historia = jQuery.jqplot ('chart_cuenta_historia', [chart.series['Cuenta pendiente'].historia],
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
            var chart_cuenta_look = jQuery.jqplot ('chart_cuenta_look', [chart.series['Cuenta pendiente'].look],
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

            console.log(getsection);
            if (getsection == "list") {
                $("#tabTabla a").trigger("click");
                $("#typeprogram").val("<?php echo $getProgram; ?>");
            }

        });
    </script>
<?php
    require_once('footer.php');
?>
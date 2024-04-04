<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Logbook {{ $logbook->tanggal ?? '-' }} {{ $logbook->petugas ?? '-'}} {{ $logbook->jadwal_dinas ?? '-' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      table>tbody>tr>td {
        font-size: 0.7em;
      }
    </style>
</head>
<body class="border border-dark" onload="window.print()" >

  <div class="container" >
    <!-- Officer -->
    <div class="row" >
      <div class="col-12" >
        <h5 class="text-center mt-2 text-success " >LOGBOOK DINAS HARIAN STASIUN GEOFISIKA JAYAPURA</h5>
        <div style="display: flex; flex-direction: row; justify-content: space-between; ">
            <h6 class="text-success">Nama : {{ $logbook->petugas ?? '-'}}</h6>
            <h6 class="text-success">Tanggal : {{ \Carbon\Carbon::parse($logbook->tanggal)->format('d-M-Y') }}</h6>
            <h6 class="text-success">Dinas : {{ $logbook->jadwal_dinas ?? '-' }} </h6>       
        </div>

      </div>
    </div>
    <!-- Aloptama -->
    <div class="row">
      <div class="col-7">
        <div class="row">
          <div class="col-6">
          <h6 class="text-success" >ALOPTAMA</h6>
          <table class="table table-striped " >
          <tr>
            <td> SEISCOMP </td>
            <td>: {{ ucfirst($logbook->seiscomp) ?? ''}} </i> </td>
          </tr>
          <tr>
            <td> NEXSTORM </td>
            <td>: {{ ucfirst($logbook->nexstorm_petir) ?? '' }}  </td>
          </tr>
          <tr>
            <td> ACCELERO </td>
            <td>: {{ ucfirst($logbook->accelero_system) ?? '' }}  </td>
          </tr>
          <tr>
            <td> DVB </td>
            <td>: {{ ucfirst($logbook->dvb) ?? ''}}  </td>
          </tr>
          <tr>
            <td> JAMSTEC </td>
            <td>: {{ ucfirst($logbook->jamstec) ?? '' }}  </td>
          </tr>
          <tr>
            <td> JISVIEW </td>
            <td>: {{ ucfirst($logbook->jiesview) ?? '' }}  </td>
          </tr>
          <tr>
            <td> DISEMINASI </td>
            <td>: {{ ucfirst($logbook->diseminasi) ?? '' }}  </td>
          </tr>
          <tr>
            <td> ESDX </td>
            <td>: {{ ucfirst($logbook->esdx) ?? '' }}  </td>
          </tr>
          <tr>
            <td> MAGDAS </td>
            <td>: {{ ucfirst($logbook->magdas) ?? '' }}  </td>
          </tr>
          <tr>
            <td> LEMI </td>
            <td>: {{ ucfirst($logbook->lemi) ?? '' }}  </td>
          </tr>
          <tr>
            <td> HELLMANN </td>
            <td>: {{ ucfirst($logbook->hillman) ?? '' }}  </td>
          </tr>
          <tr>
            <td> OBS </td>
            <td>: {{ ucfirst($logbook->obs) ?? '' }}  </td>
          </tr>
          <tr>
            <td> ARWS </td>
            <td>: {{ ucfirst($logbook->arws) ?? '' }}  </td>
          </tr>
          <tr>
            <td> HV SAMPLER </td>
            <td>: {{ ucfirst($logbook->hv_sampler) ?? '' }}  </td>
          </tr>
        </table>
        <h6 class="text-success">SUPPORTS</h6>
          <table class="table table-striped" >
          <tr>
            <td> GENSET </td>
            <td>: {{ ucfirst($logbook->listrik_genset) ?? '' }}  </td>
          </tr>
          <tr>
            <td> INTERNET </td>
            <td>: {{ ucfirst($logbook->internet) ?? '' }}  </td>
          </tr>
          <tr>
            <td> TELEPON </td>
            <td>: {{ ucfirst($logbook->telefon) ?? '' }}  </td>
          </tr>
          <tr>
            <td> AC </td>
            <td>: {{ ucfirst($logbook->ac) ?? '' }}  </td>
          </tr>
          <tr>
            <td> Air </td>
            <td>: {{ ucfirst($logbook->air) ?? '' }}  </td>
          </tr>
          <tr>
            <td> CCTV </td>
            <td>: {{ ucfirst($logbook->cctv) ?? '' }}  </td>
          </tr>
        </table>
        <h6 class="text-success">DATA</h6>
        <table class="table table-striped" >
          <tbody>
              <tr>
                <td>BMKGSOFT</td>
                <td>: {{ ucfirst($logbook->intensitas_hujan) ?? '' }} </td>
              </tr>
              <tr>
                <td>PETIR</td>
                <td>: {{ ucfirst($logbook->data_nexstorm) ?? '' }} </td>
              </tr>
              <tr>
                <td>JAMSTEC</td>
                <td>: {{ ucfirst($logbook->data_jamstec) ?? '' }} </td>
              </tr>
          </tbody>
        </table>
          </div>
          <!-- Start of PENDUKUNG OPERASIONAL -->
          <div class="col-6" >

        <!-- START OF DATA -->
                  
          <table class="table table-striped" >

              <tr>
                <td>SEISMISITAS</td>
                <td>: {{ ucfirst($logbook->data_seismisitas) ?? '' }} </td>
              </tr>     
              <tr>
                <td>BERAT KERTAS</td>
                <td>: {{ $logbook->berat_kertas ?? '' }} </td>
              </tr>
              <tr>
                <td>COUNTER AWAL</td>
                <td>: {{ $logbook->counter_awal ?? '' }} </td>
              </tr>
              <tr>
                <td>COUNTER AKHIR</td>
                <td>: {{ $logbook->counter_akhir ?? '' }} </td>
              </tr>
              <tr>
                <td>FLOW RATE AWAL</td>
                <td>: {{ $logbook->flow_rate_awal ?? ''}} </td>
              </tr>
              <tr>
                <td>FLOW RATE AKHIR</td>
                <td>: {{ $logbook->flow_rate_akhir ?? ''}} </td>
              </tr>
          </table>
          <h6 class="text-success">SEISMIC STATIONS</h6>
          <table class="table table-striped" >
            <tbody>
                <tr>
                  <td>ARMI</td>
                  <td>: {{ ucfirst($logbook->armi) ?? '' }} </td>
                </tr>
                <tr>
                  <td>ARPI</td>
                  <td>: {{ ucfirst($logbook->arpi) ?? '' }} </td>
                </tr>   
                <tr>
                  <td>BAKI</td>
                  <td>: {{ ucfirst($logbook->baki) ?? '' }} </td>
                </tr>  
                <tr>
                  <td>BNDI</td>
                  <td>: {{ ucfirst($logbook->bndi) ?? '' }} </td>
                </tr>    
                <tr>
                  <td>DYPI</td>
                  <td>: {{ ucfirst($logbook->dypi) ?? '' }} </td>
                </tr>
                <tr>
                  <td>ERPI</td>
                  <td>: {{ ucfirst($logbook->erpi) ?? '' }} </td>
                </tr>     
                <tr>
                  <td>FAKI</td>
                  <td>: {{ ucfirst($logbook->faki) ?? '' }} </td>
                </tr>   
                <tr>
                  <td>FKMPM</td>
                  <td>: {{ ucfirst($logbook->fkmpm) ?? '' }} </td>
                </tr> 
                <tr>
                  <td>GENI</td>
                  <td>: {{ ucfirst($logbook->geni) ?? '' }} </td>
                </tr>
                <tr>
                  <td>GLMI</td>
                  <td>: {{ ucfirst($logbook->glmi) ?? '' }} </td>
                </tr> 
                <tr>
                  <td>IWPI</td>
                  <td>: {{ ucfirst($logbook->iwpi) ?? '' }} </td>
                </tr> 
                <tr>
                  <td>JAY</td>
                  <td>: {{ ucfirst($logbook->jay) ?? '' }} </td>
                </tr>  
                <tr>
                  <td>KMPI</td>
                  <td>: {{ ucfirst($logbook->kmpi) ?? '' }} </td>
                </tr> 
                <tr>
                  <td>KMSI</td>
                  <td>: {{ ucfirst($logbook->kmsi) ?? '' }} </td>
                </tr>   
                <tr>
                  <td>KRAI</td>
                  <td>: {{ ucfirst($logbook->krai) ?? '' }} </td>
                </tr>
                <tr>
                  <td>LJPI</td>
                  <td>: {{ ucfirst($logbook->ljpi) ?? '' }} </td>
                </tr>
                <tr>
                  <td>MBPI</td>
                  <td>: {{ ucfirst($logbook->mbpi) ?? '' }} </td>
                </tr> 

            </tbody>
          </table>
          </div>
        </div>
              <!-- END PENDUKUNG OPERASIONAL -->
      </div>
      <!-- SEISMIC STATION -->
      <div class="col-5" >
        <div class="row" >
          <div class="col-6" >
            <table class="table table-striped" >
              <tbody>
                <tr>
                  <td>MIPI</td>
                  <td>: {{ ucfirst($logbook->mipi) ?? '' }} </td>
                </tr>
                <tr>
                  <td>MMPI</td>
                  <td>: {{ ucfirst($logbook->mmpi) ?? '' }} </td>
                </tr>   
                <tr>
                  <td>MSAI</td>
                  <td>: {{ ucfirst($logbook->msai) ?? '' }} </td>
                </tr> 
                <tr>
                  <td>MTN</td>
                  <td>: {{ ucfirst($logbook->mtn) ?? '' }} </td>
                </tr>   
                <tr>
                  <td>NBPI</td>
                  <td>: {{ ucfirst($logbook->nbpi) ?? '' }} </td>
                </tr>
                <tr>
                  <td>RAPI</td>
                  <td>: {{ ucfirst($logbook->rapi) ?? '' }} </td>
                </tr>
                <tr>
                  <td>RKPI</td>
                  <td>: {{ ucfirst($logbook->rkpi) ?? '' }} </td>
                </tr>
                <tr>
                  <td>SANI</td>
                  <td>: {{ ucfirst($logbook->sani) ?? '' }} </td>
                </tr>  
                <tr>
                  <td>SAUI</td>
                  <td>: {{ ucfirst($logbook->saui) ?? '' }} </td>
                </tr> 
                <tr>
                  <td>SJPM</td>
                  <td>: {{ ucfirst($logbook->sjpm) ?? '' }} </td>
                </tr> 
                <tr>
                  <td>SKPM</td>
                  <td>: {{ ucfirst($logbook->skpm) ?? '' }} </td>
                </tr>        
              </tbody>
            </table>
          </div>
          <div class="col-6" >
            <table class="table table-striped" >
              <tbody>
                <tr>
                  <td>SMPI</td>
                  <td>: {{ ucfirst($logbook->smpi) ?? '' }} </td>
                </tr>
                <tr>
                  <td>SRPI</td>
                  <td>: {{ ucfirst($logbook->srpi) ?? '' }} </td>
                </tr>
                <tr>
                  <td>STPI</td>
                  <td>: {{ ucfirst($logbook->stpi) ?? '' }} </td>
                </tr> 
                <tr>
                  <td>SWI</td>
                  <td>: {{ ucfirst($logbook->swi) ?? '' }} </td>
                </tr> 
                <tr>
                  <td>TAMI</td>
                  <td>: {{ ucfirst($logbook->tami) ?? '' }} </td>
                </tr>
                <tr>
                  <td>TLE2</td>
                  <td>: {{ ucfirst($logbook->tle2) ?? '' }} </td>
                </tr>
                <tr>
                  <td>TNTI</td>
                  <td>: {{ ucfirst($logbook->tnti) ?? '' }} </td>
                </tr> 
                <tr>
                  <td>TSPI</td>
                  <td>: {{ ucfirst($logbook->tspi) ?? '' }} </td>
                </tr>
                <tr>
                  <td>WAMI</td>
                  <td>: {{ ucfirst($logbook->wami) ?? '' }} </td>
                </tr> 
                <tr>
                  <td>WWPI</td>
                  <td>: {{ ucfirst($logbook->wwpi) ?? '' }} </td>
                </tr>             
              </tbody>
            </table>
          </div>
        </div>
        <div class="row" >
          <div class="col-12" >
            <table class="table table-striped" >
              <tbody>
                <tr>
                  <td>WEBSITE</td>
                  <td>: {{ ucfirst($logbook->website) ?? '' }} </td>
                </tr>  
                <tr>
                  <td>MEDIA SOSIAL</td>
                  <td>: {{ ucfirst($logbook->media_sosial) ?? '' }} </td>
                </tr> 
                <tr>
                  <td colspan="2" class="text-center" >KETERANGAN</td>
                </tr>
                <tr>
                  <td>JUMLAH GEMPA</td>
                  <td>: {{ $seismisitas ?? '' }} </td>
                </tr>
              <tr>
                <td>INTENSITAS</td>
                <td>: {{ $hujan->hilman ?? '' }} mm<sup>2</sup> </td>
              </tr>
              <tr>
                <td>OBS</td>
                <td>: {{ $hujan->obs ?? '' }} mm<sup>2</sup> </td>
              </tr>
              <tr>
                <td>PENAKAR</td>
                <td>: {{ ucfirst($hujan->petugas) ?? '' }} </td>
              </tr>
                <tr>
                  <td>{{ ucfirst($logbook->keterangan) ?? '' }}</td>
                </tr>
              </tbody>
            </table>
            <p>A.N KEPALA STASIUN GEOFISIKA JAYAPURA <br>
            KETUA TIM OBSERVASI</p>
            <br>
            <br>
            <br>
            NETTY YUFITA BARU, S.Si, M.Si
          </div>
        </div>
      </div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
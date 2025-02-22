
  <!-- <link rel="stylesheet" href="./styles.css"> -->
<style>
.center {
  /* margin: 0; */
  position: relative;
  /* top: 50%; */
  -ms-transform: translateY(-42%);
  transform: translateY(0%); 
}
.barcode {
  text-align: center;
  font-size: large;
  width: 80%;
}
</style>
<div class="container-fluid">
  <div class="row mt-4">

    <div class="col-12">
      <div class="row">
        <div class="card" id="badan-connect">
          <div class="card-body">
            <div class="row" style="text-align: center;">
              <div class="center">
              <h2 >Connect Jembatan Timbang</h2>
                <li class="list-group-item border-0 px-0">
                  <div class="form-check form-switch ps-0">
                    <!-- <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked> -->
                    <a type="button" class="btn btn-warning" style="max-width: 15em;" id="connect-to-serial" title="Conncet Jembatan Timbang">Connect <i></i></a>
                  </div>
                </li>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>  
    
  </div> 
</div>
  
<div class="container-fluid">
  <div class="row mt-4">
    <div class="col-12">
      <form id="form-wcs" method="post">
        <div class="row">
          <div class="card h-100" id="badan-read" style="display: ;">
            <div class="card-body">
              <div class="row" style="text-align: center;">
                <div class="center">
                  <div class="form-group">
                  <h2>Data Barcode</h2>
                  <!-- <button class="message-button btn btn-primary" id='get-serial-messages' data-value="0" >Get Data</button> -->
                  <label><i><a style="color: red;">Arahkan kursor anda ke form input berikut *</a></i></label>
                  <br>
                  <input class="form-control" type="text" id="get-serial-messages" >
                  </div>
                </div>
              </div>
              <div class="row">

                <div class="form-group">
                  <h5 >No. Transaksi </h5>
                  <input id="no_transaksi" name="no_transaksi" class="form-control barcode" readonly >
                </div>

                <div class="col-lg-12 col-md-12 ">
                  <h4>Detail WO : </h4>
                </div>

                <input id = "tipe_tiket" name="tipe_tiket" type="text" hidden >
                <input id = "createby" name="createby" type="text" hidden >

                <div class="col-lg-4 col-md-4 mt-4">
                  <div class="form-group">
                    <h5 >No. WO </h5>
                    <input id="no_wo" name="no_wo" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >Jenis Tebu </h5>
                    <input id="jenis_tebu" name="jenis_tebu" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >Kepala Regu </h5>
                    <input id="kepala_regu" name="kepala_regu" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >Tanggal Muat</h5>
                    <input id="tgl_muat" name="tgl_muat" class="form-control barcode" readonly >
                  </div>
                  
                  
                </div>

                <div class="col-lg-4 col-md-4 mt-4">
                  <div class="form-group">
                    <h5 >No. Petak </h5>
                    <input id="no_petak" name="no_petak" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >Kontraktor Harvesting </h5>
                    <input id="kontraktor" name="kontraktor" class="form-control barcode" readonly >
                    <input id="kode_kontraktor" name="kode_kontraktor" hidden type="text" >
                  </div>

                  <div class="form-group">
                    <h5 >Retase </h5>
                    <input id="retase" name="retase" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >Jam Muat </h5>
                    <input id="jam_muat" name="jam_muat" class="form-control barcode" readonly >
                  </div>
                
                </div>

                <div class="col-lg-4 col-md-4 mt-4">
                  <div class="form-group">
                    <h5 >Ancak </h5>
                    <input id="ancak" name="ancak" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >Tanggal Tebang</h5>
                    <input id="tgl_tebang" name="tgl_tebang" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >No Tiket</h5>
                    <input id="no_tiket" name="no_tiket" class="form-control barcode" readonly >
                  </div>
                  
                  <div class="form-group">
                    <h5 >Kontraktor Delivery </h5>
                    <input id="kon_delivery" name="kon_delivery" class="form-control barcode" readonly >
                    <input id="kode_kon_delivery" name="kode_kon_delivery" hidden type="text" >
                  </div>
            
                  
                </div>

                <div class="col-lg-12 col-md-12 mt-4">
                    <h4>Detail Truck : </h4>
                </div>

                <div class="col-lg-4 col-md-4 mt-4">

                  <div class="form-group">
                    <h5 >No Truck </h5>
                    <input id="no_truck" name="no_truck" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >Rute </h5>
                    <input id="rute" name="rute" class="form-control barcode" readonly >
                  </div>
                  
                </div>

                <div class="col-lg-4 col-md-4 mt-4">

                  <div class="form-group">
                    <h5 >Driver </h5>
                    <input id="driver" name="driver" class="form-control barcode" readonly >
                  </div>

                  
                
                </div>

                <div class="col-lg-4 col-md-4 mt-4">
                  <div class="form-group">
                    <h5 >No Polisi </h5>
                    <input id="no_polisi" name="no_polisi" class="form-control barcode" readonly >
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 mt-4">
                    <h4>Detail Barge : </h4>
                </div>

                <div class="col-lg-4 col-md-4 mt-4">

                  <div class="form-group">
                    <h5 >No Barge </h5>
                    <input id="no_barge" name="no_barge" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >No Tug Boat </h5>
                    <input id="no_tug_boat" name="no_tug_boat" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >No Alat Muat 2</h5>
                    <input id="no_alat2" name="no_alat2" class="form-control barcode" readonly >
                  </div>

                </div>

                <div class="col-lg-4 col-md-4 mt-4">

                  <div class="form-group">
                    <h5 >No Alat Muat 1</h5>
                    <input id="no_alat1" name="no_alat1" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >Nahkoda</h5>
                    <input id="nahkoda" name="nahkoda" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >Op. Alat Muat 2</h5>
                    <input id="op_alat2" name="op_alat2" class="form-control barcode" readonly >
                  </div>

                </div>

                <div class="col-lg-4 col-md-4 mt-4">

                  <div class="form-group">
                    <h5 >Op. Alat Muat 1</h5>
                    <input id="op_alat1" name="op_alat1" class="form-control barcode" readonly >
                  </div>

                  <div class="form-group">
                    <h5 >Tujuan</h5>
                    <input id="tujuan" name="tujuan" class="form-control barcode" readonly >
                  </div>

                </div>

              </div>
              
              <div class="row mt-4" >
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">  
                    <h5>Berat Timbang In </h5>
                    <input id="berat-in" name="berat_in" class="message form-control barcode" readonly >
                  </div>

                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <h5>Berat Timbang Out </h5>
                    <input id="berat-out" name="berat_out" class="message form-control barcode" readonly >
                  </div>
                </div>
              </div>

              <div class="row" >
                <div class="col-lg-6 col-md-6 mt-4">
                  <div class="ms-auto ">
                    <a class="btn btn-secondary" type="button" id="cetak-in" type="button" title="Cetak Barcode Timbangan In">Cetak Barcode IN &emsp;<span class="fa fa-barcode"></span></a>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 mt-4">
                  <div class="ms-auto ">
                    <a class="btn btn-success" type="button" id="cetak-out" type="button" title="Cetak Barcode Timbangan In">Cetak Tiket OUT &emsp;<span class="fa fa-file"></span></a>
                  </div>
                </div>
              </div>
              <!-- <button class="message-button" data-value="1" disabled="true">On</button> -->
            </div>
            
          </div>
        </div>
      </form>
      
        
        <!-- <textarea style="width: 100%;" id="data_text"></textarea> -->
      
    </div>
  </div>
</div> 
  <!-- <script src="./dist/serial-handler.js" type="module"></script>
  <script src="./dist/app.js" type="module"></script> -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script type="module">

    
    class SerialScaleController {
        constructor() {
            this.encoder = new TextEncoder();
            this.decoder = new TextDecoder();
        }
        async init() {
            if ('serial' in navigator) {
                try {
                    console.log(navigator)
                    const port = await navigator.serial.requestPort();  
                    await port.open({ baudRate: 9600, dataBits: 7, stopBits: 1, bufferSize: '16777216' });
                    this.reader = port.readable.getReader();
                    let signals = await port.getSignals();
                    $("#badan-connect").fadeOut(500);
                    $("#badan-read").fadeIn(500);
                }
                catch (err) {
                    console.error('There was an error opening the serial port:', err);
                }
            }
            else {
                console.error('Web serial doesn\'t seem to be enabled in your browser. Try enabling it by visiting:');
                console.error('chrome://flags/#enable-experimental-web-platform-features');
                console.error('opera://flags/#enable-experimental-web-platform-features');
                console.error('edge://flags/#enable-experimental-web-platform-features');
            }
        }
        async read() {
            try {
                const readerData = await this.reader.read();
                console.log(readerData)
                return this.decoder.decode(readerData.value);
            }
            catch (err) {
                const errorMessage = `error reading data: ${err}`;
                console.error(errorMessage);
                return errorMessage;
            }
        }
    }

    const serialScaleController = new SerialScaleController();
    const connect = document.getElementById('connect-to-serial');
    const getSerialMessages = document.getElementById('get-serial-messages');

    connect.addEventListener('pointerdown', () => {
      serialScaleController.init();
    });

    getSerialMessages.addEventListener('change', async () => {
      getSerialMessage();
    });

    async function getSerialMessage() {
      const dataBit = await serialScaleController.read();
      var value = $("#get-serial-messages").val();
      $.ajax({
        data: {data: dataBit, value: value},
        cache: false,
        dataType: "json",
        type: "post",
        url: "<?= base_url() ?>/home/serialData",
        success: function(data){
          // document.querySelector("#berat-in").value = data['call'];
          
          $("#tipe_tiket").val(data['tipe']);
          $("#get-serial-messages").val("");
          $("#no_transaksi").val(data['rd'][1]);
          $("#ancak").val(data['rd'][11]);
          $("#no_tiket").val(data['rd'][2]);
          $("#no_petak").val(data['rd'][4]);
          $("#kontraktor").val(data['nama_kontraktor']);
          $("#kode_kontraktor").val(data['rd'][5]);
          $("#kon_delivery").val(data['nama_kon_delivery']);
          $("#kode_kon_delivery").val(data['rd'][6]);
          $("#no_barge").val(data['rd'][7]);
          $("#no_truck").val(data['rd'][8]);
          $("#driver").val(data['rd'][9]);
          $("#no_polisi").val(data['rd'][10]);
          $("#ancak").val(data['rd'][11]);
          $("#retase").val(data['rd'][12]);
          $("#rute").val(data['rd'][13]);
          $("#kepala_regu").val(data['rd'][15]);
          $("#no_tug_boat").val(data['rd'][16]);
          $("#nahkoda").val(data['rd'][17]);
          $("#tujuan").val(data['rd'][14]);
          $("#jenis_tebu").val(data['rd'][19]);
          $("#no_alat1").val(data['rd'][20]);
          $("#op_alat1").val(data['rd'][21]);
          $("#no_alat2").val(data['rd'][22]);
          $("#op_alat2").val(data['rd'][23]);
          $("#tgl_muat").val(data['tgl_muat']);
          $("#jam_muat").val(data['jam_muat']);
          $("#tgl_tebang").val(data['rd'][18]);
          $("#createby").val(data['rd'][24]);
          
        }
      })
      // document.querySelector("#serial-messages-container").value = await serialScaleController.read()
    }

    
    $("#cetak-in").click(function(){
        var data = $("#form-wcs").serialize();
        $.ajax({
          data:  $("#form-wcs").serialize(),
          type: 'post',
          dataType: 'json',
          cache: false,
          url: '<?= base_url() ?>/home/saveTruckIn',
          success: function(data){
            alert(data['msg']);
          }
        })
    })
    

  </script>


<html>
    <title>Persyaratan</title>
    <head></head>
    <style type="text/css">
        @page{
            size:21cm 27cm;
        }
        .page_break { page-break-before: always; }
            
        html{
            background-color: black;
            margin: 10px;
            padding: 0;
            font-size:12px;
            font-family: "Arial, Helvetica, sans-serif";
        }
        .header{
            width:21cm;
            clear:both;
                
        } 
        .judul {
            font-size:16px;
            font-weight:bold;           
                
        }
        .text-bold{
            font-weight: bold;
        }
        .text-right{
            text-align: right;
        }
        .text-center{
            text-align:center;
        }
        .kiriBawah{
            font-style:italic;
            top:-100px;
        }
        .content{
            padding:10px;
            display:inline;
        }
        .persyaratan{
            border:1px solid #eee;
            border-collapse:collapse;
            width:100%;
            font-size:11px !important;
        }
        
        .persyaratan th{
            border:1px solid #eee;
            padding:5px;
        }
        .persyaratan td{
            border:1px solid #eee;
            padding:5px;
        }
        hr { border: 0; border-bottom: 1px dashed #ccc; background: #999; }
    </style>
    <body>
    @foreach($persyaratan as $pmr)
         <div class="header">
             <img src="{{url('public/images/cop_surat.png')}}">
         </div>
         <br/>
         <center class="judul">DAFTAR PERSYARATAN</center>
         <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->generate($substrDate)) }}" width=80px class="text-right" style="float:right">        
         <br/>
         <table>
             <tr>
                 <td>Nama Izin</td>
                 <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                 <td>{{ucwords(strtolower($pmr->nama_izin))}}</td>
             </tr>
             <tr>
                 <td>OPD</td>
                 <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                 <td>{{$pmr->opd->opd}}</td>
             </tr>
             <tr>
                 <td>Tanggal Print</td>
                 <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                 <td class="text-bold">{{$date}}</td>
             </tr>
         </table>
        
         
         <br/>
         <hr/>
         <br/>
         <table class="persyaratan">
             <thead>
                <tr>
                 <th width='30px' class="text-center">No</th>
                 <th>Nama Persyaratan</th>
                </tr>
             </thead>
             <tbody>
                 @php($no = 1)
                 @foreach($pmr->persyaratan as $prs)
                     <tr>
                         <td class="text-center">{{$no}}</td>
                         <td>{{$prs->persyaratan}}</td>
                     </tr>
                 @php($no++)
                 @endforeach
             </tbody>
         </table>
         <br/>
         

    @endforeach
    
    </body>
</html>
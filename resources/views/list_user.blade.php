@extends('layouts.app')

@section('content')
<div class="container">
   <table class="table table-bordered table-striped">
      <thead class="thead-dark">
         <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php 
         foreach ($users as $user) { 
         ?> 
            <tr> 
               <td><?= $user['id'] ?></td> 
               <td><?= $user['nama'] ?></td> 
               <td><?= $user['npm'] ?></td> 
               <td><?= $user['nama_kelas'] ?></td> 
               <td> <!-- Aksi seperti edit/delete bisa ditempatkan di sini --> </td> 
            </tr> 
         <?php 
         } 
         ?> 
      </tbody>
   </table>
</div>
@endsection

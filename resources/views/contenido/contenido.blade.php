@extends('plantilla')
    @section('contenido')
    <template v-if="menu==0"> 
    <h1>Pagina Principal</h1>
    </template>
    <template v-if="menu==1"> 
    <categoria></categoria>
    </template>
    <template v-if="menu==2"> 
    <marca></marca>
    </template>
    <template v-if="menu==3"> 
    <proveedor></proveedor>
    </template>
    <template v-if="menu==4"> 
    <producto></producto>
    </template>
    <template v-if="menu==5"> 
    <venta></venta>
    </template>
    <template v-if="menu==6"> 
    <h1>contenido del menu 6</h1>
    </template>
    <template v-if="menu==7"> 
    <h1>contenido del menu 7</h1>
    </template>
    <template v-if="menu==8"> 
    <h1>contenido del menu 8</h1>
    </template>
    <template v-if="menu==9"> 
    <h1>contenido del menu 9</h1>
    </template>
    <template v-if="menu==10"> 
    <h1>contenido del menu 10</h1>
    </template>
    <template v-if="menu==11"> 
    <h1>contenido del menu 11</h1>
    </template>
    <template v-if="menu==12"> 
    <h1>contenido del menu 12</h1>
    </template>
    @endsection
<template>
    <div>
        <div class="module">
            <span class="text">Procesos/Eventos</span>
                <!-- <button class="access" router-link="/search">Acceder</button> -->
                <div class="access">
                    <span class="button"><router-link to="/crear"><font-awesome-icon :icon="['fas', 'pen-fancy']" class="marg" />Crear</router-link></span>
                    <span class="button"><router-link to="/view"><font-awesome-icon :icon="['fas', 'copy']" />Acceder</router-link></span>
                    <span class="button"><router-link to="/buscar"><font-awesome-icon :icon="['fas', 'magnifying-glass']" />Buscar</router-link></span>
                </div>
        </div>
    </div>
</template>
<style scoped>
a{
  color:white;
  text-decoration: none;
  position: relative;
  top: 14%;
  font-size: large;
}
.marg{
  margin-left: 8px;
}
.module{
  border-style: solid;
  width: 300px;
  height: 160px;
  background: #363699;
  border-radius: 5px;
  border-color: #363699;
}
.text{
  color: white;
  position: relative;
  top: 20%;
}
.access{
  width: -webkit-fill-available;
  position: relative;
  top: 40%;
  display: flex;
  margin-left: 40px
}
.button{
  border: 1px solid;
  width: 65px;
  height: 60px;
  background: #282870;
  border-radius: 5px;
  border-color: #f1f1f7;
  margin: 3px;
}
</style>
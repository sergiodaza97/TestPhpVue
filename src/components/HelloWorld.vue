<template>
  <nav class="title">
    <router-link to="/">Modulos</router-link>
  </nav>
  <div>
      <div class="module">
        <span class="text">Procesos/Eventos</span>
          <div class="access">
            <router-link to="/view">Acceder</router-link>
          </div>
      </div>
    </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #f4f6f8;
}

nav a.router-link-exact-active {
  color: #363699;
}
.title{
  font-size: 30px;
}
a{
  color:white;
  text-decoration: none;
}
.module{
  border-style: solid;
  width: 250px;
  height: 80px;
  background: #363699;
  border-radius: 5px;
  border-color: #363699;
  font-size: larger;
}
.text{
  color: white;
  position: relative;
  top: 20%;
  font-size: larger;
}
.access{
  width: -webkit-fill-available;
  position: relative;
  top: 40%;
  background-color: #282870;
  color: white;
  height: 23px;
  border-radius: 5px;
}
.ti{
  font-size: 25px;
}
</style>

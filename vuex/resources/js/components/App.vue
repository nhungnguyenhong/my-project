<template>
  <div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">登録</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          
               <li :class="['nav-item', { active: $route.name === 'users.index'}]">
                        <router-link class="nav-link" :to="{name: 'users.index'}">ホーム</router-link>
                </li>

              <li :class="['nav-item', { active: $route.name === 'users.create'}]">
                        <router-link class="nav-link" :to="{name: 'users.create'}">登録</router-link>
                    </li>
            

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="検索">
          <button class="btn btn-success my-2 my-sm-0" type="submit">検索</button>
        </form>
      </div>
  </nav>
    <router-view></router-view>
  </div>
</template>

<script>
    export default {
    }
</script>

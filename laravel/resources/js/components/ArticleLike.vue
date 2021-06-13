<template>
  <div>
    <button type="button" class="btn m-0 p-1 shadow-none">
      <i
        class="fas fa-heart mr-1"
        :class="{'red-text':this.isLikedBy, 'animated heartBeat fast':this.gotToLike}"
        @click="clickLike"
      />
    </button>
    {{ countLikes }}
  </div>
</template>

<script>
//==========ここから追加==========
export default {
  props: {
    initialIsLikedBy: {
      type: Boolean,
      default: false,
    },
    //追加
    initialCountLikes: {
      type: Number,
      default: 0,
    },
    //追加
    authorized: {
      type: Boolean,
      default: false,
    },
    endpoint: {
      type: String,
    },
    //ここまで追加
  },
  data() {
    return {
      isLikedBy: this.initialIsLikedBy,
      //追加
      countLikes: this.initialCountLikes,
      //animation機能
      gotToLike: false,
    };
  },
  //追加
  methods: {
    clickLike() {
      if (!this.authorized) {
        alert("いいね機能はログイン中のみ使用できます");
        return;
      }

      this.isLikedBy ? this.unlike() : this.like();
    },
    async like() {
      const response = await axios.put(this.endpoint);

      this.isLikedBy = true;
      this.countLikes = response.data.countLikes;
      //animation機能
      this.gotToLike = true;
    },
    async unlike() {
      const response = await axios.delete(this.endpoint);

      this.isLikedBy = false;
      this.countLikes = response.data.countLikes;
      //animation機能
      this.gotToLike = false;
    },
  },
};
//==========ここまで追加==========
</script>
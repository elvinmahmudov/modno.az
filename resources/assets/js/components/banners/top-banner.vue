<template>
    <div class="top-banner" v-show="imageUrl">
        <a :href="url"><img :src="imageUrl" alt=""></a>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                currentBanner: {}
            }
        },
        computed: {
            banners() {
                var banners = this.$store.state.banners;
                var topBanners = [];

                for (var i = 0; i < banners.length; i++) {
                    if (banners[i].type == 'top-banner') {
                        topBanners.push(banners[i]);
                    }
                }


                return topBanners;
            },
            url() {
                return ((typeof this.currentBanner.url !== 'undefined') ? this.currentBanner.url : '');
            },
            imageUrl() {
                return ((typeof this.currentBanner.image_url!== 'undefined') ? ('storage/'+ this.currentBanner.image_url) : '');
            }
        },
        mounted() {
            var i = 0;
            this.changeImages(i)
                this.$store.state.topBannerHeight = $('.top-banner img').height();
            setInterval(function () {
                this.changeImages(i);
                i++;
                var max = this.banners.length;
                if (i == max) i = 0;
            }.bind(this), 0);
        },
        methods: {
            changeImages(i) {
                if (typeof this.banners[i] !== 'undefined') {
                    this.currentBanner = this.banners[i];
                }
            }
        }
    }
</script>
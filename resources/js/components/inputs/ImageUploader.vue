<template>
    <div>
        <div class="w-full flex justify-center"  v-if="image">
            <div class="image-preview ">
                <img class="rounded-circle shadow mb-4" :src="image">
            </div>
        </div>
        <div class="w-full flex justify-center"  v-else-if="imageData">
            <div class="image-preview ">
                <img class="rounded-circle shadow mb-4" :src="imageData">
            </div>
        </div>
        <div class="w-full flex justify-center" v-else>
            <div class="image-preview" >
                <img class=" rounded-circle shadow mb-4" src="/images/placeholders/avatar.png">
            </div>
        </div>
        <div class="file-upload-form mb-2">
            <label for="profile_image"> Upload an image file:</label>
            <input type="file" id="profile_image" class="form-control-file" :name="name" @change="previewImage">
        </div>
    </div>
</template>

<script>
export default {
    props: {
        name: {
            required: true,
            type: String
        },
        image: {
            required: false,
            default: null
        }
    },
    data() {
        return {
            imageData: ""
        };
    },
    methods: {
        previewImage: function(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    this.imageData = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
};
</script>

<style lang="scss" scoped>
.image-preview {
    position: relative;
    width: 11rem;
    height: 11rem;
    overflow: hidden;
    border-radius: 50%;

    img {
        width: auto;
        height: auto;
        min-height: 100%;
    }
}
</style>

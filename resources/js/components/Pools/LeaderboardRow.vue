<template>
<a :href="link"
   class="flex justify-between hover:bg-blue-lightest transition transition-property-all p-3">
    <div class="flex justify-between text-xl w-full">
        <div class="leaderboard-image shadow-md ">
            <img :src="photo" alt="" class="rounded mr-2">
        </div>
        <div class="flex flex-col justify-center pl-2 flex-1">
            <div class="flex flex-col justify-around text-xl text-blue-dark font-bold text-right">{{ score }}</div>
            <div class="text-base text-right">{{ name }}</div>
        </div>
    </div>
</a>
</template>

<script>
export default {
    props: {
        link: {
            required: true,
            type: String
        },
        photo: {
            required: true,
            type: String
        },
        score: {
            required: true,
            type: String
        },
        name: {
            required: true,
            type: String
        }
    }
};
</script>

<style scoped>
</style>

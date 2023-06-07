<script setup>
import { Link } from '@inertiajs/vue3'

</script>

<template>
    inertiaテストです。<br>
    <a href="/">aタグ経由です</a><br>
    <Link href="/">Link経由です</Link><br>
    <Link :href="route('inertia.index')">名前付きルートの確認です</Link><br>
    <Link :href="route('inertia.show', { id : 50 })">ルートパラメータのテスト</Link>

</template>
<!-- .wslconfigのテスト -->
<script lang="js">
    import { router } from "@inertiajs/svelte";
    import axios from "axios";
    import { onMount } from 'svelte';


    export let file;
    export let file_id;
    export let needs_password;

    $: header = "New File";
    $: usePassword = needs_password;

    let password = "";
    let file_body = "";

    onMount(() => {
        if (file) {
            header = file.file_title;
            file_body = file.file_content;
        }
    });
    const handle_secure_fetch = () => {

        router.post(`/file/${file_id}`, {
            file_password: password
        }, {
            onSuccess: (res) => {
                const file_response = res.props.file
                header = res.props.file.file_title;
                file_body = res.props.file.file_content;
            }
        })
    }


    const handle_save = () => {
        if (!file_body || !header) return alert("Please enter a title and some content");

        router.post('/create', {
            file_title: header,
            file_content: file_body,
            file_password: password
        });

    };
</script>

<main class="main_background w-full min-h-svh flex flex-col items-center text-white primary_font">
    {#if !usePassword}
    <div class="w-2/5 min-h-svh pt-36">
        <input class="min-w-1/4 text-5xl bg-transparent" value={header || "New file"} on:change={(e) => header = e.target.value} />
        <textarea class="w-full p-4 rounded-md primary_bg min-h-[700px] bg-transparent resize-none" bind:value={file_body} />
        {#if !(file || file_id)}
        <div class="flex items-center mt-2 text-2xl">
            <p>Save as:</p>
            <button class="ml-auto mr-4 px-4 py-2 rounded-full primary_bg text-white primary_font" on:click={() => usePassword = true}>Secret</button>
            <button class="px-4 py-2 rounded-full primary_bg text-white primary_font" on:click={handle_save}>Public</button>
        </div>
        {/if}
    </div>

    {:else}
    <div class="w-full h-full flex justify-center items-center absolute top-0">
        <div class="w-1/5 dark_bg rounded-md px-8 py-6">
            <p class="mb-2">Enter a password</p>
            <div class="flex relative items-center">
                <input bind:value={password} class="w-full p-4 rounded-full primary_bg" placeholder="password" type="password" />
                <button class="ml-auto mr-4 px-4 py-2 rounded-full primary_bg text-white primary_font absolute right-0" on:click={needs_password ? handle_secure_fetch : handle_save}>Save</button>
            </div>
        </div>
    </div>
    {/if}
</main>


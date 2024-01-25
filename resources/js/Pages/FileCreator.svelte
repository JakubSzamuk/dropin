<script lang="js">
    import { router } from "@inertiajs/svelte";
    import { onMount } from 'svelte';
    import Doc from "./components/Doc.svelte";
    import PasswordPrompt from "./components/PasswordPrompt.svelte";
    import DocSaver from "./components/DocSaver.svelte";


    $: file = {
        file_title: "New file",
        file_content: ""
    };

    $: usePassword = false;

    $: passwordValue = "";


    const handle_save = (password) => {
        if (password) {
            usePassword = true;
            return;
        }
        if (!file.file_content || !file.file_title) return alert("Please enter a title and some content");

        router.post('/create', {
            file_title: file.file_title,
            file_content: file.file_content,
            file_password: passwordValue
        });
    };

</script>

<main class="main_background w-full min-h-svh flex flex-col items-center text-white primary_font">
    <div class="flex flex-col">
        {#if !usePassword}
        <Doc bind:file />
        <DocSaver {handle_save} />
        {/if}
    </div>
    {#if usePassword}
    <PasswordPrompt bind:password={passwordValue} handle_click={handle_save} />
    {/if}
</main>


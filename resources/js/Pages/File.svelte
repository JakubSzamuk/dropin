<script lang="js">
  import { router } from "@inertiajs/svelte";
  import Doc from "./components/Doc.svelte";
  import PasswordPrompt from "./components/PasswordPrompt.svelte";
  import DocSaver from "./components/DocSaver.svelte";


  export let fileProp;
  $: file = fileProp;

  $: usePassword = fileProp.requiresPassword || false;
  $: password = "";

  const assign_to_file = (newFile) => {
    file = newFile;
  }

  const handle_secure_fetch = () => {
    router.post(`/file/${file.file_id}`, {
      file_password: password
    }, {
      onSuccess: (res) => {
        assign_to_file(res.props.file);
      }
    })

    usePassword = false;
  }
</script>

<main class="main_background w-full min-h-svh flex flex-col items-center text-white primary_font">
  {#if !usePassword && file}
  <Doc file />
  {:else if !usePassword}
  <p>Loading</p>
  {:else}
  <PasswordPrompt bind:password handle_click={handle_secure_fetch} />
  {/if}
</main>


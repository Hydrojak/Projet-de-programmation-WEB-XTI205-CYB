window.saveLog = async function saveLog(payload) {
  try {
    await fetch("/api/log_create.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
    });
  } catch (e) {

  }
};
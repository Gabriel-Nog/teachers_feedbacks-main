const filters = document.querySelector(".filters");
function openFilters() {
    filters.classList.toggle("actived")
}

function handleFeedbackAction(event) {
    const buttonClicked = event.currentTarget;
    const buttons = buttonClicked?.parentNode?.children ?? [];
    const feedbackAction = buttonClicked?.parentNode?.parentNode.querySelector('.feedback_action') ?? null;
    const allowedActions = ['like', 'dislike'];

    if ([buttonClicked, allowedActions.includes(buttonClicked.dataset.action), feedbackAction, buttons].some(verify => !!!verify)) return;

    const action = buttonClicked.dataset.action;

    Array.from(buttons).forEach(btn => {
        btn.style.opacity = "0.4";
    });

    buttonClicked.style.opacity = "1";
    feedbackAction.value = action;


}

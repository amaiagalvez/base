# Larecipe ES

---

- [Cards](#cards)
- [Buttons](#buttons)
    - [Normal](#normal)
    - [Success](#success)
- [Badges](#badges)
- [Progress](#progress)

<a name="cards"></a>
## Cards

<larecipe-card shadow>
    Example card
</larecipe-card>

<a name="buttons"></a>
## Buttons

<a name="normal"></a>
### Normal
<larecipe-button radius="full">Example button</larecipe-button>

<a name="success"></a>
### Success
<larecipe-button type="success" radius="full">Success button</larecipe-button>

<a name="badges"></a>
## Badges

<larecipe-badge type="primary" circle icon="fa fa-user"></larecipe-badge>
<larecipe-badge type="success" rounded>Holly</larecipe-badge>
<larecipe-badge type="danger" rounded>Molly</larecipe-badge>

<a name="progress"></a>
## Progress

<larecipe-progress type="success" :value="60"></larecipe-progress>

<larecipe-card>
    <larecipe-badge type="success" circle class="mr-3" icon="fa fa-heart"></larecipe-badge> BinaryTorch
    <larecipe-progress type="success" :value="100"></larecipe-progress>
</larecipe-card>

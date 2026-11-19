<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>ClaroCC · Control de calidad</title>
<meta name="color-scheme" content="light">
<style>
:root{--primary:#166c83;--primarydark:#104c5e;--soft:#eaf6f8;--bg:#f5f8fa;--text:#1d3140;--muted:#647989;--border:#dce6eb;--white:#fff;--success:#14795d;--warn:#a2620d;--red:#bc4d4d;--shadow:0 7px 26px rgba(22,70,92,.065)}
*{box-sizing:border-box}
body{margin:0;background:var(--bg);color:var(--text);font:15px/1.5 system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif}
button,input,select,textarea{font:inherit}
button{cursor:pointer}
button:disabled{opacity:.5;cursor:not-allowed}
:focus-visible{outline:3px solid #32b0c2;outline-offset:2px}
header{background:#fff;border-bottom:1px solid var(--border);padding:0 max(22px,calc((100vw - 1120px)/2));}
.header-top{min-height:80px;display:flex;align-items:center;justify-content:space-between;gap:18px}
.brand{display:flex;gap:12px;align-items:center}
.mark{width:42px;height:42px;display:grid;place-items:center;color:white;background:var(--primary);border-radius:13px;font-weight:850;font-size:19px;letter-spacing:-.08em}
.brand strong{font-size:20px;letter-spacing:-.04em;display:block;line-height:1.18}
.brand small{font-size:12px;color:var(--muted)}
.mode{font-size:12px;border-radius:99px;background:#edf6f8;color:var(--primarydark);padding:6px 11px;font-weight:650;white-space:nowrap}
nav{display:flex;gap:5px;overflow-x:auto;padding-bottom:0}
nav button{border:0;border-bottom:3px solid transparent;background:transparent;color:#647889;padding:14px 18px;font-weight:700;white-space:nowrap}
nav button:hover{color:var(--primary)}nav button.active{color:var(--primary);border-color:var(--primary)}
main{max-width:1164px;margin:auto;padding:34px 22px 60px}
.view[hidden]{display:none!important}
h1{font-size:clamp(25px,3.7vw,35px);letter-spacing:-.042em;line-height:1.18;margin:0}
h2{font-size:18px;letter-spacing:-.025em;margin:0 0 5px}
h3{font-size:17px;margin:0 0 4px}
p{margin:0}.sub{color:var(--muted);margin:9px 0 24px;max-width:670px}
.hero{background:linear-gradient(115deg,#125773,#218596);color:#fff;border-radius:20px;padding:28px;display:flex;justify-content:space-between;gap:24px;align-items:center;margin-bottom:18px;box-shadow:var(--shadow)}
.hero h1{max-width:620px}.hero p{margin-top:12px;color:#d8f4f5;max-width:590px}.hero .hero-actions{flex-shrink:0}
.hero .primary{background:#fff;color:var(--primarydark)}
.stats{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:14px;margin-bottom:19px}
.stat,.card{background:white;border:1px solid var(--border);border-radius:16px;box-shadow:var(--shadow)}
.stat{padding:19px}.stat small{display:block;color:var(--muted);font-weight:650;font-size:12px}.stat strong{display:block;font-size:29px;line-height:1.25;margin-top:7px;letter-spacing:-.05em}
.card{padding:24px}.card + .card{margin-top:18px}
.card-header{display:flex;justify-content:space-between;align-items:center;gap:13px;margin-bottom:17px;flex-wrap:wrap}
.muted{color:var(--muted)}.small{font-size:12px}.eyebrow{color:var(--primary);font-size:12px;text-transform:uppercase;letter-spacing:.1em;font-weight:800;margin-bottom:6px}
.primary,.outline{display:inline-flex;align-items:center;justify-content:center;gap:8px;border-radius:11px;padding:11px 17px;font-weight:700;border:1px solid transparent;text-decoration:none}
.primary{background:var(--primary);color:#fff}.primary:hover{background:var(--primarydark)}
.outline{background:#fff;color:var(--primary);border-color:#cddfe6}.outline:hover{background:var(--soft)}
.full{width:100%}.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}.field{display:block}.field.span2{grid-column:1/-1}.field span{display:block;font-size:13px;font-weight:700;margin-bottom:6px}
.field input,.field select,.field textarea,.search{display:block;width:100%;background:white;border:1px solid #cbdbe4;border-radius:10px;padding:11px 12px;color:var(--text);min-height:44px}
.field textarea{height:95px;resize:vertical}.field input:focus,.field select:focus,.field textarea:focus,.search:focus{border-color:var(--primary)}
.notice{margin-top:16px;padding:12px 14px;border-radius:10px;background:#edf6f8;color:#345868;font-size:13px}
.notice.success{background:#e9f6ef;color:#126849}.notice.error{background:#fbeeee;color:#a02a2a}
.flex{display:flex;align-items:center;justify-content:space-between;gap:10px;flex-wrap:wrap}.toolbar{display:flex;gap:10px;margin-bottom:16px;flex-wrap:wrap}.toolbar .search{max-width:340px;flex:1 1 230px}.toolbar select{padding:9px 11px;min-height:44px;border:1px solid #cbdbe4;border-radius:10px;background:#fff;color:var(--text)}
.case-layout{display:grid;grid-template-columns:minmax(240px,.88fr) minmax(0,1.5fr);gap:16px}
.items{display:grid;gap:9px;align-content:start;max-height:700px;overflow:auto}
.item{background:#fff;border:1px solid var(--border);border-radius:12px;text-align:left;width:100%;padding:14px;display:flex;flex-direction:column;gap:4px;color:var(--text)}
.item:hover,.item.selected{border-color:#379aaa;box-shadow:0 0 0 2px #379aaa19}.item.selected{background:#f3fbfc}
.item strong{font-size:14px}.item .code{font-size:11px;font-weight:750;color:#637d8d}.item .item-bottom{display:flex;justify-content:space-between;align-items:center;gap:8px;margin-top:4px;flex-wrap:wrap}
.tag{display:inline-block;background:#edf1f4;color:#516579;border-radius:99px;font-size:11px;font-weight:750;padding:4px 9px}
.tag.red{background:#fff0ef;color:#b64a4a}.tag.green{background:#e7f5ef;color:#13805d}.tag.amber{background:#fff5e7;color:#9b6514}
.detail{border:1px solid var(--border);background:#fff;border-radius:16px;padding:22px;min-height:260px}.detail .intro{font-size:12px;color:var(--muted)}
.detail h3{font-size:20px;margin:4px 0 0;letter-spacing:-.03em}.detail hr{border:0;border-top:1px solid var(--border);margin:17px 0}
.quick{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:9px;margin:17px 0}
.quick div{background:#f5f9fb;border:1px solid #e6eef2;border-radius:9px;padding:11px}
.quick small{font-size:11px;display:block;color:var(--muted);margin-bottom:5px}.quick strong{font-size:13px}
.next{background:#f1f8fa;border:1px solid #d3e8ed;border-radius:12px;padding:16px;margin-top:12px}.next label{font-size:13px;font-weight:800;display:block;margin-bottom:8px}.next select{width:100%;padding:10px;border:1px solid #bed5df;border-radius:9px;min-height:43px;background:#fff}.next button{margin-top:11px}.next p{font-size:12px;color:#4d6876;margin:10px 0 0}
.empty{padding:35px 18px;text-align:center;color:var(--muted);background:#fff;border:1px dashed #c9dbe4;border-radius:14px}
.history-items{list-style:none;margin:0;padding:0}.history-items li{padding:13px 0 13px 22px;border-bottom:1px solid var(--border);position:relative;font-size:14px}.history-items li:before{content:'';position:absolute;left:0;top:21px;background:#3c9ca9;width:9px;height:9px;border-radius:50%}.history-items time{display:block;color:var(--muted);font-size:11px;margin-top:4px}
.latest{display:grid;gap:8px}.latest .line{border:1px solid var(--border);border-radius:10px;padding:12px 14px;display:flex;justify-content:space-between;gap:10px;align-items:center}.latest .line button{color:var(--primary);border:0;background:transparent;font-weight:700}
footer{max-width:1164px;margin:0 auto 35px;padding:0 22px;color:var(--muted);font-size:12px}
@media(max-width:730px){.hero{display:block}.hero-actions{margin-top:20px}.stats{grid-template-columns:repeat(3,minmax(0,1fr))}.case-layout{grid-template-columns:1fr}.items{max-height:330px}.form-grid{grid-template-columns:1fr}.field.span2{grid-column:auto}.quick{grid-template-columns:1fr 1fr}main{padding-top:24px}.card{padding:18px}}
@media(max-width:450px){.stats{gap:7px}.stat{padding:12px}.stat strong{font-size:24px}nav button{padding:12px 11px}.mode{font-size:10px}.quick{grid-template-columns:1fr}}
</style>
</head>
<body>
<header>
 <div class="header-top">
  <div class="brand"><span class="mark" aria-hidden="true">CC</span><div><strong>ClaroCC</strong><small>Control de calidad de productos</small></div></div>
  <span class="mode">Prototipo local</span>
 </div>
 <nav aria-label="Secciones principales">
  <button type="button" class="active" data-view="inicio">Inicio</button>
  <button type="button" data-view="registrar">Registrar</button>
  <button type="button" data-view="revisar">Control de Calidad</button>
  <button type="button" data-view="historial">Historial</button>
 </nav>
</header>
<main>
 <section class="view" id="view-inicio">
  <div class="hero"><div><p class="eyebrow" style="color:#bde6ef">Gestión simplificada</p><h1>Controla cada producto, paso a paso.</h1><p>Registra una novedad, revisa su estado y continúa con la siguiente acción.</p></div><div class="hero-actions"><button type="button" class="primary" data-go="registrar">+ Registrar producto</button></div></div>
  <div class="stats"><div class="stat"><small>Productos registrados</small><strong id="stat-total">0</strong></div><div class="stat"><small>En proceso</small><strong id="stat-open">0</strong></div><div class="stat"><small>Terminados</small><strong id="stat-done">0</strong></div></div>
  <div class="card"><div class="card-header"><div><h2>Últimos productos</h2><p class="small muted">Selecciona uno para continuar su proceso.</p></div><button type="button" class="outline" data-go="revisar">Ver todos</button></div><div id="latest" class="latest"></div></div>
 </section>
 <section class="view" id="view-registrar" hidden>
  <p class="eyebrow">Verificación</p><h1>Registrar producto</h1><p class="sub">Ingresa los datos básicos de un producto con novedad.</p>
  <div class="card" style="max-width:760px">
   <form id="form-create">
    <div class="form-grid">
     <label class="field"><span>Código *</span><input id="codigo" required maxlength="40" placeholder="Ej. PROD-001"></label>
     <label class="field"><span>Nombre del producto *</span><input id="nombre" required maxlength="100" placeholder="Ej. Mouse inalámbrico"></label>
     <label class="field"><span>Cantidad *</span><input id="cantidad" type="number" min="1" max="99999" step="1" value="1" required></label>
     <label class="field"><span>Problema detectado</span><select id="problema"><option value="Por determinar">Por determinar</option><option value="Empaque">Empaque</option><option value="Estético">Estético</option><option value="Mecánico">Mecánico</option><option value="Inconsistencia">Información inconsistente</option><option value="Dudas de funcionamiento">Dudas de funcionamiento</option></select></label>
     <label class="field"><span>Prioridad</span><select id="urgencia"><option>Normal</option><option>Urgente</option></select></label>
     <label class="field span2"><span>Observaciones (opcional)</span><textarea id="observaciones" maxlength="500" placeholder="Describe brevemente lo ocurrido..."></textarea></label>
    </div>
    <div style="margin-top:20px"><button class="primary" type="submit">Registrar producto</button></div>
    <p role="status" id="form-msg" class="notice" hidden></p>
   </form>
  </div>
 </section>
 <section class="view" id="view-revisar" hidden>
  <p class="eyebrow">Seguimiento</p><h1>Control de Calidad</h1><p class="sub">Selecciona un producto. El sistema te mostrará una sola acción para avanzar.</p>
  <div class="toolbar"><input class="search" type="search" id="search" placeholder="Buscar código o producto" aria-label="Buscar producto"><select id="filter" aria-label="Filtrar productos"><option value="todos">Todos</option><option value="pendientes">En proceso</option><option value="urgentes">Urgentes</option><option value="terminados">Terminados</option></select></div>
  <div class="case-layout"><div id="case-list" class="items"></div><div id="case-detail" class="detail" aria-live="polite"><div class="empty">Selecciona un producto de la lista para ver su siguiente paso.</div></div></div>
 </section>
 <section class="view" id="view-historial" hidden>
  <p class="eyebrow">Trazabilidad</p><h1>Historial</h1><p class="sub">Consulta los movimientos realizados por cada producto.</p>
  <div class="card" style="max-width:850px"><label class="field" style="max-width:500px"><span>Seleccionar producto</span><select id="hist-case"><option value="">Elige un producto</option></select></label><div id="hist-items" style="margin-top:18px" class="empty">Selecciona un producto para consultar sus movimientos.</div></div>
 </section>
</main>
<footer>Versión demostrativa. La información se guarda únicamente en este navegador. Para uso empresarial se necesitarán usuarios, permisos, base de datos y validación de las reglas del proceso.</footer>
<script>
'use strict';
const KEY='cc_regularizacion_simple_v2';
const OLD_KEY='cc_regularizacion_demo_v1';
const CLOSED=new Set(['Listo para perchar','Finalizado']);
const $=id=>document.getElementById(id);
const now=()=>new Date().toISOString();
const makeEvent=detalle=>({fecha:now(),detalle});
const esc=text=>String(text??'').replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
const formatDate=date=>{const d=new Date(date);return Number.isNaN(d.getTime())?'Fecha no disponible':d.toLocaleString('es-EC',{dateStyle:'short',timeStyle:'short'})};
function load(){try{const v=localStorage.getItem(KEY);if(v!==null){const a=JSON.parse(v);return Array.isArray(a)?a:[]}const previous=localStorage.getItem(OLD_KEY);if(previous){const a=JSON.parse(previous);return Array.isArray(a)?a:[]}}catch(e){console.warn('No se pudo leer almacenamiento local',e)}return []}
let cases=load();let selected=null;let active='inicio';let histSelection=null;
const transitions={
'Detectado':[['Enviar a Control de Calidad','En cola CC','CC','Retenido','Producto trasladado y notificado a Control de Calidad']],
'En cola CC':[['Iniciar revisión','En revisión','CC','Retenido','Inicia la revisión del producto en CC']],
'En revisión':[
 ['Consultar Importaciones','En consulta','CC','Retenido','Se solicita información a Importaciones'],
 ['Solicitar restauración','Esperando autorización','CC','Retenido','Se propone restauración y solicita autorización'],
 ['Enviar a Etiquetado','En cola etiquetado','Etiquetado','Retenido','Se notifica a Etiquetado para regularización'],
 ['Retener producto','Retenido','Producto retenido','Retenido','Se genera reporte y se retiene el producto'],
 ['Liberar: detección errónea','Listo para perchar','Producto por perchar','Óptimo','Se informa a Verificación y se libera el producto']],
'En consulta':[['Continuar revisión','En revisión','CC','Retenido','Importaciones responde y continúa la revisión'],['Requiere etiquetado','En cola etiquetado','Etiquetado','Retenido','Se confirma corrección requerida en etiquetado']],
'Esperando autorización':[['Autorizar restauración','En restauración','CC','Retenido','Se autoriza y comienza la restauración'],['Solicitar insumos','Esperando insumos','Compras','Retenido','Se solicitan insumos para la restauración'],['No autorizar: retener','Retenido','Producto retenido','Retenido','No se autoriza la restauración']],
'Esperando insumos':[['Iniciar restauración','En restauración','CC','Retenido','Se recibieron insumos y comienza la restauración']],
'En restauración':[['Enviar a revisión final','Revisión final','CC','Retenido','Se completó la restauración; pendiente revisión'],['No fue posible restaurar','Retenido','Producto retenido','Retenido','Restauración fallida; producto retenido']],
'Revisión final':[['Aprobar y enviar a perchar','Listo para perchar','Producto por perchar','Óptimo','Producto verificado y liberado'],['Enviar a Etiquetado','En cola etiquetado','Etiquetado','Retenido','Se requiere etiquetado adicional'],['Retener producto','Retenido','Producto retenido','Retenido','Producto no superó la revisión final']],
'En cola etiquetado':[['Iniciar regularización','En regularización','Etiquetado','Retenido','Inicia regularización en Etiquetado']],
'En regularización':[['Finalizar regularización','Listo para perchar','Producto por perchar','Óptimo','Etiquetado completo; producto liberado']],
'Listo para perchar':[['Confirmar perchado','Finalizado','Percha','Óptimo','Producto perchado y caso finalizado']],
'Retenido':[['Solicitar nueva revisión','En cola CC','CC','Retenido','Reapertura simulada: requiere autorización real']],
'Finalizado':[]
};
function preferredAction(r,options){
  if(r.estado!=='En revisión')return 0;
  const byProblem={'Empaque':'Enviar a Etiquetado','Estético':'Solicitar restauración','Mecánico':'Solicitar restauración','Inconsistencia':'Consultar Importaciones','Dudas de funcionamiento':'Consultar Importaciones'};
  const label=byProblem[r.problema];const index=options.findIndex(o=>o[0]===label);return index>=0?index:-1;
}
function save(){try{localStorage.setItem(KEY,JSON.stringify(cases))}catch(e){alert('No se pudo guardar la información en este navegador.')}render()}
function isOpen(r){return !CLOSED.has(r.estado)&&r.estado!=='Retenido'}
function show(view){active=view;document.querySelectorAll('[data-view]').forEach(b=>b.classList.toggle('active',b.dataset.view===view));document.querySelectorAll('.view').forEach(v=>v.hidden=v.id!=='view-'+view);render();window.scrollTo({top:0,behavior:'auto'})}
function tags(r){const urgent=r.urgencia==='Urgente'?'<span class="tag red">Urgente</span>':'';const state=CLOSED.has(r.estado)?'green':r.estado==='Retenido'?'red':r.estado.includes('cola')?'amber':'';return urgent+' <span class="tag '+state+'">'+esc(r.estado)+'</span>'}
function renderHome(){ $('stat-total').textContent=cases.length;$('stat-open').textContent=cases.filter(isOpen).length;$('stat-done').textContent=cases.filter(r=>CLOSED.has(r.estado)).length;
const ordered=cases.slice().sort((a,b)=>new Date(b.fecha)-new Date(a.fecha)).slice(0,4);
$('latest').innerHTML=ordered.length?ordered.map(r=>'<div class="line"><div><strong>'+esc(r.nombre)+'</strong><div class="small muted">'+esc(r.codigo)+' · '+esc(r.estado)+'</div></div><button type="button" data-quick="'+esc(r.id)+'">Ver caso</button></div>').join(''):'<div class="empty">Aún no hay productos. Registra el primero para comenzar.</div>';
$('latest').querySelectorAll('[data-quick]').forEach(b=>b.addEventListener('click',()=>{selected=b.dataset.quick;show('revisar')}));}
function filtered(){let term=$('search').value.trim().toLowerCase();let filter=$('filter').value;return cases.filter(r=>((r.codigo||'')+' '+(r.nombre||'')).toLowerCase().includes(term)).filter(r=>filter==='todos'||filter==='pendientes'&&isOpen(r)||filter==='terminados'&&CLOSED.has(r.estado)||filter==='urgentes'&&r.urgencia==='Urgente'&&isOpen(r)).sort((a,b)=>Number(b.urgencia==='Urgente')-Number(a.urgencia==='Urgente')||new Date(a.fecha)-new Date(b.fecha))}
function renderCases(){let visible=filtered();if(selected&&!visible.some(r=>r.id===selected))selected=null;if(!selected&&visible.length)selected=visible[0].id;
$('case-list').innerHTML=visible.length?visible.map(r=>'<button type="button" class="item '+(selected===r.id?'selected':'')+'" data-id="'+esc(r.id)+'"><span class="code">'+esc(r.codigo)+'</span><strong>'+esc(r.nombre)+'</strong><span class="small muted">'+esc(r.problema)+' · '+esc(r.cantidad)+' ud.</span><span class="item-bottom">'+tags(r)+'</span></button>').join(''):'<div class="empty">No se encontraron productos.</div>';
$('case-list').querySelectorAll('[data-id]').forEach(b=>b.addEventListener('click',()=>{selected=b.dataset.id;renderCases()}));renderDetail();}
function renderDetail(){const r=cases.find(r=>r.id===selected);const node=$('case-detail');if(!r){node.innerHTML='<div class="empty">Selecciona un producto de la lista para ver su siguiente paso.</div>';return}
const options=transitions[r.estado]||[];let chosen=preferredAction(r,options);
node.innerHTML='<div class="flex"><span class="intro">'+esc(r.codigo)+'</span>'+tags(r)+'</div><h3>'+esc(r.nombre)+'</h3><div class="quick"><div><small>Etapa actual</small><strong>'+esc(r.estado)+'</strong></div><div><small>Área responsable</small><strong>'+esc(r.area)+'</strong></div><div><small>Novedad</small><strong>'+esc(r.problema)+'</strong></div><div><small>Unidades</small><strong>'+esc(r.cantidad)+'</strong></div></div>'+(r.observaciones?'<p class="small muted">'+esc(r.observaciones)+'</p>':'')+'<hr><div class="next"><label for="next-choice">¿Qué sigue?</label>'+
(options.length===0?'<span class="tag green">Este caso está finalizado</span>':options.length===1?'<p style="font-size:14px;font-weight:750;color:var(--text)">'+esc(options[0][0])+'</p>':('<select id="next-choice" aria-label="Seleccionar siguiente acción"><option value="" '+(chosen<0?'selected':'')+'>Selecciona el resultado de la revisión</option>'+options.map((opt,i)=>'<option value="'+i+'" '+(chosen===i?'selected':'')+'>'+esc(opt[0])+'</option>').join('')+'</select>'))+
(options.length?'<button type="button" class="primary full" id="apply-move" '+(options.length>1&&chosen<0?'disabled':'')+'>Confirmar y continuar</button>':'')+
(options.length>1&&chosen>=0&&r.estado==='En revisión'?'<p>Acción sugerida según la novedad; el responsable debe confirmarla.</p>':'')+'</div>';
const choice=$('next-choice');if(choice)choice.addEventListener('change',()=>{$('apply-move').disabled=choice.value===''});
const btn=$('apply-move');if(btn)btn.addEventListener('click',()=>{const index=choice?Number(choice.value):0;if(choice&&choice.value==='')return;apply(r.id,index)})}
function apply(id,index){const r=cases.find(x=>x.id===id);if(!r)return;const op=(transitions[r.estado]||[])[index];if(!op)return;const [label,estado,area,condicion,detalle]=op;
if(!confirm('¿Confirmas «'+label+'» para el producto '+r.codigo+'?'))return;
r.estado=estado;r.area=area;r.condicion=condicion;r.historial=Array.isArray(r.historial)?r.historial:[];r.historial.push(makeEvent(detalle));save();}
function renderHistory(){const select=$('hist-case');const old=histSelection||select.value;select.innerHTML='<option value="">Elige un producto</option>'+cases.map(r=>'<option value="'+esc(r.id)+'">'+esc(r.codigo)+' · '+esc(r.nombre)+'</option>').join('');histSelection=cases.some(r=>r.id===old)?old:(selected||'');select.value=histSelection;
const r=cases.find(r=>r.id===histSelection);$('hist-items').className=r?'':'empty';$('hist-items').innerHTML=r?'<h2>'+esc(r.nombre)+'</h2><p class="small muted">Estado actual: '+esc(r.estado)+'</p><ol class="history-items">'+(r.historial||[]).slice().reverse().map(h=>'<li>'+esc(h.detalle)+'<time>'+esc(formatDate(h.fecha))+'</time></li>').join('')+'</ol>':'Selecciona un producto para consultar sus movimientos.';}
function render(){renderHome();renderCases();renderHistory()}
$('form-create').addEventListener('submit',e=>{e.preventDefault();const value=id=>$(id).value.trim();const qty=Number(value('cantidad'));const code=value('codigo');const name=value('nombre');const msg=$('form-msg');msg.hidden=false;
if(!code||!name||!Number.isInteger(qty)||qty<1||qty>99999){msg.className='notice error';msg.textContent='Revisa el código, nombre y cantidad.';return}
if(cases.some(r=>(r.codigo||'').toLowerCase()===code.toLowerCase()&&isOpen(r))){msg.className='notice error';msg.textContent='Ya existe un caso activo con ese código.';return}
const r={id:'CC-'+Date.now()+'-'+Math.random().toString(36).slice(2,7),codigo:code,nombre:name,cantidad:qty,problema:value('problema'),urgencia:value('urgencia'),observaciones:value('observaciones'),estado:'Detectado',area:'Verificación',condicion:'No óptimo',fecha:now(),historial:[makeEvent('Producto identificado y registrado en Verificación')]};cases.unshift(r);selected=r.id;save();e.target.reset();msg.hidden=true;show('revisar')});
$('search').addEventListener('input',renderCases);$('filter').addEventListener('change',renderCases);$('hist-case').addEventListener('change',e=>{histSelection=e.target.value;renderHistory()});
document.querySelectorAll('[data-view]').forEach(b=>b.addEventListener('click',()=>show(b.dataset.view)));document.querySelectorAll('[data-go]').forEach(b=>b.addEventListener('click',()=>show(b.dataset.go)));
render();
</script>
</body>
</html>
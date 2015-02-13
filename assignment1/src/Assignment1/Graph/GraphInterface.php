<?php
namespace Assignment1\Graph;

use Assignment1\Edge\EdgeInterface;
use Assignment1\Graph\Exceptions\NonExistentEdgeException;
use Assignment1\Graph\Exceptions\NonIncidentEdgeException;
use Assignment1\Set\SetInterface;
use Assignment1\Vertex\VertexInterface;

interface GraphInterface
{
	/**
	 * Creates a new, empty, and undirected graph.
	 * @return GraphInterface
	 */
	public function newgraph();

	/**
	 * Return a set of all the vertices in the graph.
	 * @return SetInterface
	 */
	public function vertices();

	/**
	 * Return a set of all the edges in the graph.
	 * @return SetInterface
	 */
	public function edges();

	/**
	 * Return the number of vertices in the graph.
	 * @return int
	 */
	public function countAllVertices();

	/**
	 * Return the number of edges in the graph.
	 * @return int
	 */
	public function countAllEdges();

	/**
	 * Return the edge between vertices $v and $w. An exception is thrown if
	 * there is no such edge.
	 * @param  VertexInterface $v
	 * @param  VertexInterface $w
	 * @return EdgeInterface
	 * @throws NonExistentEdgeException If there is no associated edge
	 */
	public function getEdge($v, $w);

	/**
	 * Return the set of edges incident on vertex $v.
	 * @param  VertexInterface $v
	 * @return SetInterface
	 */
	public function incidentedges($v);

	/**
	 * Return the endvertex of edge $e distinct from vertex $v. An exception is
	 * thrown if $e is not incident on $v.
	 * @param  VertexInterface $v
	 * @param  EdgeInterface   $e
	 * @return VertexInterface
	 * @throws NonIncidentEdgeException If $e is non-incident on $v
	 */
	public function opposite($v, $e);

	/**
	 * Return the set of end vertices of edge $e.
	 * @param  EdgeInterface $e
	 * @return SetInterface
	 */
	public function endVertices($e);

	/**
	 * Test whether vertices $v and $w are adjacent.
	 * @param  VertexInterface $v
	 * @param  VertexInterface $w
	 * @return bool
	 */
	public function areAdjacent($v, $w);

	/**
	 * Insert a new vertex and return an updated graph.
	 * @param  VertexInterface $v
	 * @return GraphInterface
	 */
	public function insertVertex($v);

	/**
	 * Remove vertex $v and all its incident edges and return an updated graph.
	 * @param  VertexInterface $v
	 * @return GraphInterface
	 */
	public function removeVertex($v);

	/**
	 * Create and insert a new undirected edge with end vertices $v and $w and
	 * storing element $x and return and updated graph.
	 * @param  VertexInterface $v
	 * @param  VertexInterface $w
	 * @param  mixed           $x
	 * @return GraphInterface
	 */
	public function insertEdge($v, $w, $x);

	/**
	 * Remove edge ($v, $w) and return and updated graph.
	 * @param  VertexInterface $v
	 * @param  VertexInterface $w
	 * @return GraphInterface
	 */
	public function removeEdge($v, $w);

	/**
	 * Return the element associated with edge $e.
	 * @param  EdgeInterface $e
	 * @return mixed
	 */
	public function getEdgeElem($e);

	/**
	 * Replace the element stored at edge $e with $x and return an updated graph.
	 * @param  EdgeInterface $e
	 * @param  mixed         $x
	 * @return GraphInterface
	 */
	public function replaceEdgeElem($e, $x);
}

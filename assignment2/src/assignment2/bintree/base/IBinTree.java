package assignment2.bintree.base;

public interface IBinTree {

	public IBinTree getLeft();
	public IBinTree getRight();
	public void setLeft(IBinTree bt);
	public void setRight(IBinTree bt);
	public void setLeftRight(IBinTree left, IBinTree right);
	public boolean hasLeft();
	public boolean hasRight();
	public int sumNodes();
	public int height();
	public boolean isTwoOrNoLeaf();
	
}
